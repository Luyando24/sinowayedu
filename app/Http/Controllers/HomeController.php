<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\University;
use App\Models\Degree;
use App\Models\City;
use App\Models\StudyOption;
use App\Models\Program;

class HomeController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();
        $featuredUniversities = University::with('city')->take(6)->get();
        $degrees = Degree::all();
        $cities = City::orderBy('name')->take(3)->get();
        $studyOptions = Program::all();
        
        // Get recommended universities and programs
        $recommendedUniversities = University::with('city')
            ->where('is_recommended', true)
            ->take(8)
            ->get();
            
        $recommendedPrograms = Program::with(['university', 'degree'])
            ->where('is_recommended', true)
            ->take(8)
            ->get();

        return view('home', compact(
            'heroes', 
            'featuredUniversities', 
            'degrees', 
            'cities', 
            'studyOptions',
            'recommendedUniversities',
            'recommendedPrograms'
        ));
    }
}



