<?php

namespace App\Http\Controllers;

use App\Models\application;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        $applications = application::latest()->paginate(3);
        return view('dashboard',[
            'applications' =>$applications 
        ]);
    }
}
