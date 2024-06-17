<?php

namespace App\Jobs;

use App\Mail\ApplicationCreated;
use App\Models\application;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public application $application)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $manager=User::first();
        Mail::to($manager)->send(new ApplicationCreated($this->application));
    }
}
