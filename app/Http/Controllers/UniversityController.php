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
        $query = University::with(['city']);

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        // Limit results based on user type
        if (!auth()->check() || (auth()->check() && auth()->user()->usertype === 'normal')) {
            // For guests and normal users, limit to 8 universities
            $query->limit(8);
        } else if (auth()->check() && auth()->user()->usertype === 'partner' && !auth()->user()->subscribed()) {
            // For non-subscribed partner users, limit to 10
            $query->limit(10);
        }

        $universities = $query->paginate(12);

        return view('universities', [
            'universities' => $universities,
            'cities' => City::all(),
        ]);
    }
}





