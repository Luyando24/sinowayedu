<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
            Session::put('locale', $lang);
            App::setLocale($lang);
        }
        
        // Redirect back to the previous page
        return redirect()->back();
    }
}



