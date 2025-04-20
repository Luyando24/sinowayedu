<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Program::query();

        if ($request->filled('degree_id')) {
            $query->where('degree_id', $request->degree_id);
        }

        if ($request->filled('scholarship')) {
            $query->where('scholarship', $request->scholarship);
        }

        if ($request->filled('program')) {
            $query->where('name', 'like', '%' . $request->program . '%');
        }

        if ($request->filled('city_id')) {
            $query->whereHas('university', function ($q) use ($request) {
                $q->where('city_id', $request->city_id);
            });
        }

        if ($request->filled('intake')) {
            $query->where('intake', $request->intake);
        }

        if ($request->filled('language')) {
            $query->where('language', $request->language);
        }

        if ($request->filled('duration')) {
            $query->where('duration', $request->duration);
        }

        $programs = $query->paginate(12);

        return view('search.results', compact('programs'));
    }
}

