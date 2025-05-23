<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MembershipApplication;

class MembershipController extends Controller
{
    
    public function submitMembershipApplication(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);
         
        // Save the validated data
        MembershipApplication::create($validated);
        // Process the membership application
        return redirect()->back()->with('success', 'Membership application submitted successfully! We will get back to you soon.');
    }
}
