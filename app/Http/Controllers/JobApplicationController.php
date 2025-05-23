<?php

namespace App\Http\Controllers;
use App\Models\Career;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function store(Request $request)
   
{
    $request->validate([
        'career_id' => 'required|exists:careers,id',
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:20',
        'cover_letter' => 'required|string',
        'cv' => 'required|file|mimes:pdf|max:2048',
    ]);

    $cvPath = $request->file('cv')->store('applications', 'public');

    JobApplication::create([
        'career_id' => $request->career_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'cover_letter' => $request->cover_letter,
        'cv' => $cvPath,
    ]);
    

    return back()->with('success', 'Your application has been submitted successfully!');
}
}
