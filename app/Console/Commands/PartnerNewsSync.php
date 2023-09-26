<?php

namespace App\Console\Commands;

use App\Services\NewsPartner\SyncManager;
use Illuminate\Console\Command;

class PartnerNewsSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync news from partner source';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        return (new SyncManager)->handle(true);
    }
}
