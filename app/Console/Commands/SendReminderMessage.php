<?php

namespace App\Console\Commands;

use App\Jobs\Umkm\ReminderReport;
use Illuminate\Console\Command;

class SendReminderMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-reminder-message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        ReminderReport::dispatch();
    }
}
