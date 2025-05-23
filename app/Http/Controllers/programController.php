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
            ->when($request->university_id, fn($query) =>
                $query->where('university_id', $request->university_id))
            ->when($request->language, fn($query) =>
                $query->where('language', $request->language))
            ->when($request->city_id, fn($query) =>
                $query->whereHas('university', fn($q) =>
                    $q->where('city_id', $request->city_id)))
            ->when($request->search, fn($query) =>
                $query->where('name', 'like', '%' . $request->search . '%'))
            ->latest();
        
        // Get the total count for all programs matching the criteria
        $totalCount = $query->count();
        
        // Apply pagination with different limits based on subscription status
        if (!auth()->check() || !auth()->user()->subscribed()) {
            // For non-subscribed users, limit to 5 programs total, regardless of page
            $programs = $query->take(10)->get();
            
            // Create a custom paginator with only one page
            $programs = new \Illuminate\Pagination\LengthAwarePaginator(
                $programs,
                $totalCount,
                $totalCount, // Set per_page to total count to force single page
                1, // Force page 1
                ['path' => $request->url(), 'query' => $request->query()]
            );
        } else {
            // For subscribed users, use normal pagination
            $programs = $query->paginate(10);
        }
        
        $universities = University::all();
        $cities = City::all();

        return view('programs', compact('programs', 'universities', 'cities', 'totalCount'));
    }

public function membershipNotice()
{
    return view('membership-notice');

}
    public function membershipApplication()
{
        return view('membership-application');
    }

}







