<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        // request()->session()->put('t1', 'hi session');

        if (array_key_exists($lang, config('languages'))) {

            session(['applocale' => $lang]);            

        }

        return redirect()->back();
    }
}
