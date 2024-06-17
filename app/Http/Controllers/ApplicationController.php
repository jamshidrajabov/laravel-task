<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Models\application;
use App\Models\User;
use Illuminate\Http\Request;

use App\Mail\ApplicationCreated;
class ApplicationController extends Controller
{
    public function index()
    {

    }
    public function create()
    {
        
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|max:255',
            'message' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        if ($request->hasFile('file')) {
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

        SendMail::dispatch($application);
        return redirect()->back();
 
    }
    public function show()
    {

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
