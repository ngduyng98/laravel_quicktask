<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LocalizationController extends Controller
{
    public function changeLanguage(Request $request)
    {
        $lang = $request->language;
        $language = config('app.locale');

        switch ($lang) {
            case config('localization.en'):
                $language = config('localization.en');
                break;
            default :
                $language = config('localization.vi');
                break;
        }
        Session::put('language', $language);

        return redirect()->back();
    }
}
