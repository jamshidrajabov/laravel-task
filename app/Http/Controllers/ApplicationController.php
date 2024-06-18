<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Jobs\SendMail;
use App\Models\Answer;
use App\Models\application;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
    public function __construct()
    {
        

        // Faqat specific metodlarga qo'llash
        $this->middleware('check.application.date')->only(['store']);

        
    }
    public function index()
    {
       
        $applications = auth()->user()->applications()->latest()->paginate(3);
        
        return view('applications.myapplications',[
            'applications' => $applications
        ]);
    }
    public function create()
    {
        
    }
    public function store(ApplicationRequest $request)
    {
        $user = Auth::user();

       
        
        $validatedData = $request->validated();

        if ($request->hasFile('file')) 
        {
            $originalName = $request->file('file')->getClientOriginalName();
            $imageName =(string)round(microtime(true) * 1000) . '.' . (string)$request->ip().'_'.(string)$originalName;
            $request->file->storeAs('images', $imageName,'public');
        }
      
        $application = application::create([
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message'],
            'user_id' => auth()->user()->id,
            'file_url' => $imageName ?? null
        ]);
        $user->last_application_date = Carbon::now();
        $user->save();
        SendMail::dispatch($application);
        return redirect()->back()->with('success','Ariza muvaffaqqiyatli yuborildi');
 
    }
    public function show($id)
    {

        $application = application::find($id);
        // $answers = Answer::whereColumn('application_id', $id)->get();
        if (!$application) {
            abort(404, 'Ma\'lumot topilmadi');
        }
        $answers=$application->answers()->get();
        $count = $answers->count();
    
        return view('answer.show',[
            'application' => $application,
            'answers' => $answers,
            'count' => $count
        ]);
    }
    
    public function edit()
    {

    }
    public function update()
    {

    }
    public function destroy()
    {

    }
}
