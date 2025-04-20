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
}
