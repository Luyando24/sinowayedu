<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     *
     * @param  string  $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLang($lang)
    {
        // Check if the language is supported
        if (in_array($lang, ['en', 'ru', 'fr'])) {
            // Store the language preference in the session
            Session::put('locale', $lang);
            
            // Set the application locale
            App::setLocale($lang);
            
            // For debugging
            Log::info('Language switched to: ' . $lang);
            Log::info('Session locale is now: ' . Session::get('locale'));
            Log::info('App locale is now: ' . App::getLocale());
        }
        
        // Redirect back to the previous page
        return redirect()->back();
    }
}










