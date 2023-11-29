<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabunganController extends Controller
{
    public function index()
    {
        return view('landing-page.tabungan.index');
    }

    public function deskripsi($slug)
    {
        if ($slug == 'tabungan-lingga') {
            return view('landing-page.tabungan.tali');
        } elseif ($slug == 'tabungan-lingga-bisnis') {
            return view('landing-page.tabungan.talibis');
        } elseif ($slug == 'tabungan-ku') {
            return view('landing-page.tabungan.taku');
        } elseif ($slug == 'tabungan-berjangka') {
            return view('landing-page.tabungan.taka');
        } elseif ($slug == 'tabungan-anak-sekolah') {
            return view('landing-page.tabungan.tanas');
        } elseif ($slug == 'tabungan-lingga-perusahaan') {
            return view('landing-page.tabungan.talip');
        }
    }
}
