<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\University;
use App\Models\Degree;
use App\Models\City;

class HomeController extends Controller
{
    public function index()
    {   
        // Fetch the first 3 hero images from the database
        $heroes = Hero::orderBy('id', 'desc')->take(3)->get();
        // Fetch the first 3 university images from the database
        $featuredUniversities = University::orderBy('id', 'desc')->take(3)->get();
        //Fetch all degrees from the database
        $studyOptions = Degree::all();
        //Fetch first 6 cities from the database
        $cities = City::orderBy('id', 'desc')->take(3)->get();
        $degrees = Degree::all();
        return view('home', compact('heroes', 'featuredUniversities', 'studyOptions', 'cities', 'degrees'));
    }
}
