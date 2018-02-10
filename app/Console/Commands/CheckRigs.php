<?php

namespace App\Console\Commands;

use App\Models\Rig;
use Illuminate\Console\Command;

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

        /** @var Rig $item */
        foreach ($rig as $item) {
            $videocards = $item->videocards();
            $videocardsCount = $videocards->count();

            if (!$videocardsCount) {
                $this->warn('There are no videocards found. Skipping.');
                continue;
            }

            $this->info("Found {$videocardsCount} at {$item}");
        }
    }
}
