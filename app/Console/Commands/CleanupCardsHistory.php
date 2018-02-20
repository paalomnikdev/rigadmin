<?php

namespace App\Console\Commands;

use App\Models\VideocardHistory;
use Carbon\Carbon;
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
        try {
            VideocardHistory::where(
                'check_time',
                '<',
                Carbon::now()->subDays(7)->format('Y-m-d')
            )->delete();
        } catch (\Throwable $e) {
            \Log::error($e->getMessage(), $e->getTrace());
        }
    }
}
