<?php

namespace App\Jobs\Umkm;

use App\Mail\ReminderUmkmReport;
use App\Models\Umkm;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ReminderReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 120;

    public function handle(): void
    {
        Umkm::whereDoesntHave('incomes', function ($query) {
            $query->whereYear('date', now()->year)
                ->whereMonth('date', now()->month);
        })->with('user')->chunk(100, function ($umkms) {
            foreach ($umkms as $umkm) {
                try {
                    $user = $umkm->user;
                    if ($user && $user->email) {
                        Mail::to($user->email)->queue(new ReminderUmkmReport($user->name));
                        Log::info("Reminder sent to {$user->email} for UMKM ID {$umkm->id}");
                    } else {
                        Log::warning("Reminder not sent: missing email for UMKM ID {$umkm->id}");
                    }
                } catch (\Throwable $th) {
                    Log::info($th->getMessage(), ['reminder report job']);
                }
            }
        });
    }
}
