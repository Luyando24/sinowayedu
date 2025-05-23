<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        Log::info('Manual registration attempt', ['input' => $request->except(['password', 'password_confirmation'])]);
        
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'usertype' => ['required', 'string', 'in:normal,partner'],
            'partner_company' => ['required_if:usertype,partner', 'nullable', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
        ]);
        
        if ($validator->fails()) {
            Log::warning('Manual registration validation failed', ['errors' => $validator->errors()->toArray()]);
            return redirect()->back()->withErrors($validator)->withInput($request->except(['password', 'password_confirmation']));
        }
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'password' => Hash::make($request->password),
            'partner_company' => $request->partner_company,
            'country' => $request->country,
            'city' => $request->city,
            'phone' => $request->phone,
        ]);
        
        Log::info('User registered successfully via manual controller', ['user_id' => $user->id, 'email' => $user->email]);
        
        event(new Registered($user));
        
        Auth::login($user);
        
        return redirect('/programs');
    }
}


