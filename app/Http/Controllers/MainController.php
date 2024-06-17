<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\application;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        
        $applications = application::latest()->paginate(3);
        
        $answers=Answer::all();
    
        return view('dashboard',[
            'applications' =>$applications,
            'answers' =>$answers,   
        ]);
    }
}
