<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanupCardsHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:videocard-history';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean videocard history older than 1 week.';

    /**
     * Create a new command instance.
     *
     * @return void
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
        //
    }
}
