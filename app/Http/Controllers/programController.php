<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\University;
use App\Models\City;

class ProgramController extends Controller
{
    public function index(Request $request)
{
    $programs = Program::with(['university.city', 'degree', 'scholarship'])
        ->when($request->university_id, fn($query) =>
            $query->where('university_id', $request->university_id))
        ->when($request->language, fn($query) =>
            $query->where('language', $request->language))
        ->when($request->city_id, fn($query) =>
            $query->whereHas('university', fn($q) =>
                $q->where('city_id', $request->city_id)))
        ->when($request->search, fn($query) =>
            $query->where('name', 'like', '%' . $request->search . '%'))
        ->latest()
        ->paginate(10)
        ->withQueryString();

    $universities = University::all();
    $cities = City::all();

    return view('programs', compact('programs', 'universities', 'cities'));
}

}
