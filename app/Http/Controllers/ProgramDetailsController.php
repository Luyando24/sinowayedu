<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\University;
use App\Models\City;

class ProgramDetailsController extends Controller
{
    //Display program details
    public function ProgramDetails(Program $program)
{   
    // fetch the program details along with related data
    $program->load(['university.city', 'degree', 'scholarship']);
    // fetch universities and cities for the dropdowns
    $universities = University::all();
    $cities = City::all();
    // return the view with program details and related data
    return view('program', compact('program', 'universities', 'cities' )); // or 'programs.show'
}
}
