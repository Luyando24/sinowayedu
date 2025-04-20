<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\City;
use App\Models\Program;
use App\Models\Degree;


class UniversityController extends Controller
{
    public function universities(Request $request)
{
    $query = University::with(['city',]);

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('city_id')) {
        $query->where('city_id', $request->city_id);
    }

    $universities = $query->paginate(12);

    return view('universities', [
        'universities' => $universities,
        'cities' => City::all(),
    ]);
}
}
