<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Degree;

class UniversityDetails extends Controller
{
    // Display university details and programs under the university
    public function UniversityDetails($id)
{
    $universityDetails = University::with(['city', 'city.province', 'programs.degree'])
        ->findOrFail($id);

    $studyOptions = Degree::all();

    return view('university.details', compact('universityDetails', 'studyOptions'));
}

}
