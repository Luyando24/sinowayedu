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
    $query = Program::with(['university.city', 'degree', 'scholarship'])
        ->where('is_recommended', true)
        ->when($request->university_id, fn($query) =>
            $query->where('university_id', $request->university_id))
        ->when($request->language, fn($query) =>
            $query->where('language', $request->language))
        ->when($request->city_id, fn($query) =>
            $query->whereHas('university', fn($q) =>
                $q->where('city_id', $request->city_id)))
        ->when($request->search, fn($query) =>
            $query->where('name', 'like', '%' . $request->search . '%'));

    $filteredPrograms = $query->get();
    $universities = University::all();
    $allPrograms = Program::all();
    $cities = City::all();

    // Pre-filter the programs for each category
    $englishPrograms = $query->where('language', 'English')->take(10)->get();
    $bachelorPrograms = $query->whereHas('degree', fn($q) => $q->where('name', 'like', '%Bachelor%'))->take(10)->get();
    $masterPrograms = $query->whereHas('degree', fn($q) => $q->where('name', 'like', '%Master%'))->take(10)->get();
    $phdPrograms = $query->whereHas('degree', fn($q) => $q->where('name', 'like', '%PhD%'))->take(10)->get();

    return view('programs', compact(
        'filteredPrograms',
        'universities',
        'cities',
        'englishPrograms',
        'bachelorPrograms',
        'masterPrograms',
        'phdPrograms',
        'allPrograms'
    ));
}
}