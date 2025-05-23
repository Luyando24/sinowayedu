<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;

class CareerController extends Controller
{
    //career page
    public function careerPage(Request $request)
{
    $jobs = Career::query()
        ->when($request->title, fn($q) => $q->where('title', 'like', '%' . $request->title . '%'))
        ->when($request->category, fn($q) => $q->where('category', $request->category))
        ->when($request->location, fn($q) => $q->where('location', 'like', '%' . $request->location . '%'))
        ->latest()
        ->paginate(8)
        ->withQueryString();

    return view('careers', compact('jobs'));
}    

    //Job details page
    public function careerDetails(Career $career)
    {   // get job
        return view('job.show', [
            'job' => $career,
            'career' => $career,
        ]);
    }
}
