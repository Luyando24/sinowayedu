<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    // display all cities
    public function cities()
    {
        // Fetch all cities from the database
        $cities = City::orderBy('id', 'desc')->paginate(9);
        return view('cities', compact('cities'));
    }

    //display city details with associated universities
    public function cityDetails($id)
    {
        // Fetch the city and its associated universities
        $city = City::with('universities')->findOrFail($id);
        return view('city.view', compact('city'));
    }
}
