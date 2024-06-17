<?php

namespace App\Http\Controllers;

use App\Jobs\AnswerToUser;
use App\Models\Answer;
use App\Models\application;
use Illuminate\Http\Request;


class AnswerController extends Controller
{
    public $application_id;
    public function __construct(application $application)
    {
        $this->application = $application;
    }
    public function index()
    {

    }
    public function create(application $id)
    {
        $this->application_id=$id;
        return view('answer.create',[
             'application' => $id,
        ]);
    }
    public function store(Request $request,$id)
    {
        $answer = new Answer();
        $answer->application_id = $id;
        $answer->answer = $request->input('answer');
        $answer->save();

        AnswerToUser::dispatch($answer)->delay(now()->addMinutes(1));


        return redirect()->route('dashboard');
        
        
    }
}
