<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use danielme85\LaravelLogToDB\LogToDB;
use Illuminate\Console\Command;

class LogCleaner extends Command
{
    public const DEFAULT_DAYS = 120;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:clean {days?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Log cleaner from database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cleanDaysAgo = $this->argument('days') ?? self::DEFAULT_DAYS;
        return LogToDB::model()->removeOlderThen(Carbon::now()->subDays((int)$cleanDaysAgo)->toDateTimeString());
    }
}
