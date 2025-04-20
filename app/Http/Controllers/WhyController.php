<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhyController extends Controller
{
    public function why()
    {
        return view('why-us');
    }
}
