<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KreditController extends Controller
{
    public function index()
    {
        return view('landing-page.kredit.index');
    }
    public function deskripsi($slug)
    {
        if ($slug == 'kredit-modal-kerja') {
            return view('landing-page.kredit.kmk');
        } elseif ($slug == 'kredit-modal-kerja-kontraktor') {
            return view('landing-page.kredit.kmkk');
        } elseif ($slug == 'kredit-investasi') {
            return view('landing-page.kredit.kinves');
        } elseif ($slug == 'kredit-kkb-sepeda-motor-baru-dan-secondhand') {
            return view('landing-page.kredit.kksmbs');
        } elseif ($slug == 'kredit-kkb-mobil-baru-dan-secondhand') {
            return view('landing-page.kredit.kksmbs');
        } elseif ($slug == 'kredit-kepemilikan-rumah-(KPR)') {
            return view('landing-page.kredit.kkpr');
        } elseif ($slug == 'kredit-kepemilikan-barang-elektronik-(KBE)') {
            return view('landing-page.kredit.kkbe');
        }
    }
}
