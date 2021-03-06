<?php

namespace App\Console\Commands;

use App\Models\Rig;
use App\Models\Videocard;
use App\Models\VideocardHistory;
use Illuminate\Console\Command;
use GuzzleHttp\Client;

class CheckRigs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:rig {rig?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rig re-check.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $rig = $this->argument('rig');

        if (!$rig) {
            $rig = Rig::all();
        } else {
            $rig = Rig::where('id', '=', $rig)->get();
        }

        $this->info('Found ' . $rig->count() . ' rig(s).Starting to check.');

        $httpClient = new Client();
        /** @var Rig $item */
        foreach ($rig as $item) {
            $this->info(
                'Checking ' . $item->getAttribute('name') . '(' . $item->getAttribute('address') . ')'
            );
            try {
                $response = $httpClient->get(
                    'http://' . $item->getAttribute('address') . '/check-alive'
                );

                $stats = @\GuzzleHttp\json_decode(
                    $response->getBody()->getContents(),
                    true
                );
                
                if (empty($stats['alive'])) {
                    throw new \Exception('Rig is dead.');
                }

                if (!empty($stats['result'])) {
                    $this->info('Found ' . sizeof($stats['result']) . ' cards.');
                    $cardsToAdd = [];
                    foreach ($stats['result'] as $cardId => $stat) {
                        $videocard = Videocard::findOrCreate($item->getKey(), $cardId);
                        $videocard->setRawAttributes([
                            'name'                  => $stat['name'] ?? 'Unnamed Videocard',
                            'id_on_rig'             => $cardId,
                            'fan_speed'             => $stat['fan_speed'] ?? 0,
                            'power_limit'           => $stat['power_limit'] ?? 0,
                            'temperature'           => $stat['temperature'] ?? 0,
                            'memory_overclock'      => $stat['memory_overclock'] ?? 0,
                            'core_overclock'        => $stat['core_overclock'] ?? 0,
                        ]);
                        $cardsToAdd[] = $videocard;
                    }
                    $history = [];
                    /** @var Videocard $card */
                    foreach ($cardsToAdd as $card) {
                        $cardData = $card->getAttributes();
                        $cardData['rig_id'] = $item->getKey();
                        if (!empty($cardData['last_check'])) {
                            $cardData['check_time'] = $cardData['last_check'];
                            unset($cardData['last_check']);
                        }
                        $history[] = $cardData;
                    }
                    VideocardHistory::insert($history);
                    $item->videocards()
                        ->saveMany($cardsToAdd);
                }
                $item->setAttribute('active', true)->save();
                $this->info(
                    'Finished ' . $item->getAttribute('name') . '(' . $item->getAttribute('address') . ')'
                );
            } catch (\Throwable $e) {
                $this->error($e->getMessage());
                $item
                    ->setAttribute('active', false)
                    ->save();
                \Log::error($e->getMessage(), $e->getTrace());
                continue;
            }
        }
    }
}
