<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepositoController extends Controller
{
    public function index()
    {
        return view('landing-page.deposito.index');
    }
    public function deskripsi($slug)
    {
        if ($slug == 'deposito-lingga-reguler') {
            return view('landing-page.deposito.toer');
        } elseif ($slug == 'deposito-lingga-extra') {
            return view('landing-page.deposito.tora');
        }
    }
}
