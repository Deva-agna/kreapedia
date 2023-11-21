<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Berita;
use App\Models\Event;
use App\Models\ProfileCompany;
use App\Models\Service;
use App\Models\Testimoni;
use App\Models\UserActive;
use App\Models\WelcomeSection;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $welcomeSection = WelcomeSection::first();
        $event_s = Event::where('status', 'active')->orderBy('tanggal_mulai', 'asc')->get();
        $service_s = Service::where('status', true)->get();
        $berita_s = Berita::where('status', true)->latest()->take(6)->get();
        $testimoni_s = Testimoni::where('status', true)->get();
        $tim_s = UserActive::with('user')->orderBy('created_at', 'asc')->get();
        $profileCompany = ProfileCompany::first();
        $about = About::first(['video', 'kata_pengantar']);
        return view('landing-page.index', compact('welcomeSection', 'event_s', 'service_s', 'berita_s', 'testimoni_s', 'tim_s', 'profileCompany', 'about'));
    }
}
