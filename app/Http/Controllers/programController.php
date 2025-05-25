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

        // Create a fresh base query for recommended programs
        $baseQuery = Program::with(['university.city', 'degree', 'scholarship'])
            ->where('is_recommended', true);

        // Get English-taught recommended programs for the first tab
        $englishPrograms = clone $baseQuery;
        $englishPrograms = $englishPrograms->where('language', 'English')->get();

        // Get Chinese language courses
        $chineseLanguagePrograms = clone $baseQuery;
        $chineseLanguagePrograms = $chineseLanguagePrograms
            ->whereHas('degree', fn($q) => $q->where('name', 'like', '%Chinese Language%'))
            ->get();

        // Get degree-specific programs - only filter by degree type, not language
        $bachelorPrograms = Program::with(['university.city', 'degree', 'scholarship'])
            ->where('is_recommended', true)
            ->whereHas('degree', fn($q) => $q->where('name', 'like', '%Bachelor%'))
            ->take(10)
            ->get();

        $masterPrograms = Program::with(['university.city', 'degree', 'scholarship'])
            ->where('is_recommended', true)
            ->whereHas('degree', fn($q) => $q->where('name', 'like', '%Master%'))
            ->take(10)
            ->get();

        $phdPrograms = Program::with(['university.city', 'degree', 'scholarship'])
            ->where('is_recommended', true)
            ->whereHas('degree', fn($q) => $q->where('name', 'like', '%PhD%'))
            ->take(10)
            ->get();

        return view('programs', compact(
            'filteredPrograms',
            'universities',
            'cities',
            'englishPrograms',
            'chineseLanguagePrograms',
            'bachelorPrograms',
            'masterPrograms',
            'phdPrograms',
            'allPrograms'
        ));
    }
}
