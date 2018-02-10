<?php

namespace App\Console\Commands;

use App\Models\Rig;
use App\Models\Videocard;
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
            $rig = Rig::find($rig);
        }

        $this->info('Found ' . $rig->count() . ' rig(s).Starting to check.');

        $httpClient = new Client();
        /** @var Rig $item */
        foreach ($rig as $item) {
            try {
                $response = $httpClient->get(
                    'http://' . $item->getAttribute('address') . '/check-alive'
                );

                $stats = @\GuzzleHttp\json_decode(
                    $response->getBody()->getContents(),
                    true
                );
                
                if (empty($stats['active'])) {
                    throw new \Exception('Rig is dead.');
                }

                if (!empty($stats['result'])) {
                    $cardsToAdd = [];
                    foreach ($stats['result'] as $cardId => $stat) {
                        $videocard = Videocard::findOrCreate($rig->getKey(), $cardId);
                        $videocard->setRawAttributes([
                            'name'              => $stat['name'] ?? 'Unnamed Videocard',
                            'id_on_rig'         => $cardId,
                            'fan_speed'         => $stat['fan_speed'] ?? 0,
                            'power_limit'       => $stat['power_limit'] ?? 0,
                            'temperature'       => $stat['temperature'] ?? 0,
                            'memory_overclock'  => $stat['memory_overclock'] ?? 0,
                            'core_overclock'    => $stat['core_overclock'] ?? 0,
                        ]);
                        $cardsToAdd[] = $videocard;
                    }
                    $rig->videocards()
                        ->saveMany($cardsToAdd);
                }
            } catch (\Throwable $e) {
                $item
                    ->setAttribute('active', false)
                    ->save();
                \Log::error($e->getMessage(), $e->getTrace());
                continue;
            }
        }
    }
}
