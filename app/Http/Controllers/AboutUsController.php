<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ProfileCompany;
use App\Models\User;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = About::first();
        $profileCompany = ProfileCompany::first();
        $user_s = User::get();
        return view('landing-page.about.index', compact('about', 'profileCompany', 'user_s'));
    }
}
