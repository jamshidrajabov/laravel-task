<?php

namespace App\Jobs;

use App\Mail\AnswerSent;
use App\Models\Answer;
use App\Models\application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class AnswerToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct( public Answer $answer)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $id=$this->answer->application_id;
        $application=application::find($id);
        $ToUser=$application->user;
        
        Mail::to($ToUser)->send(new AnswerSent($this->answer));
    }
}
