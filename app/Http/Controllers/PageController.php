<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Event;
use App\Models\Literasi;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        $tim = User::count();
        $berita = Berita::count();
        $event = Event::count();
        $literasi = Literasi::count();
        return view('page.dashboard', compact('tim', 'berita', 'event', 'literasi'));
    }
}
