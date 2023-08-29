<?php

namespace App\Jobs;

use App\Mail\AdminNotifyMailer;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProccessSendAdminEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private object $data;
    private $admins;

    /**
     * Create a new job instance.
     */
    public function __construct(object $data)
    {
        $this->data = $data;
        $this->admins = User::select('id', 'email')
            ->withAdminRole()
            ->get();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->admins->isNotEmpty()) {
            Mail::to($this->admins)->send(new AdminNotifyMailer($this->data));
        }
    }
}
