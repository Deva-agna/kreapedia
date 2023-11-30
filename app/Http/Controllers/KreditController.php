<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MathPHP\Finance;

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

    public function simulasi()
    {
        define("HARI_BULAN", 30);
        define("HARI_TAHUN", 360);
        define("BULAN_TAHUN", 12);
        $angsuran = [];
        if (request('bunga_pertahun') && request('jumlah_kredit') && request('jangka_waktu') && request('metode')) {
            if (request('metode') == 'metode_flat') {
                $angsuran = [];
                $jumlah_kredit = str_replace('.', '', request('jumlah_kredit'));
                $sukuBunga = request('bunga_pertahun') / 100;
                $pokok = $jumlah_kredit / request('jangka_waktu');
                $bunga = $jumlah_kredit * $sukuBunga / request('jangka_waktu');
                $sisaPinjaman = $jumlah_kredit;
                $jumlahAngsuran = $pokok + $bunga;

                for ($i = 0; $i < request('jangka_waktu'); $i++) {
                    $sisaPinjaman -= $pokok;
                    array_push($angsuran, [
                        "no"                => $i + 1,
                        "pokok"             => round($pokok),
                        "bunga"             => round($bunga),
                        "jumlahAngsuran"    => round($jumlahAngsuran),
                        "sisaPinjaman"      => round($sisaPinjaman)
                    ]);
                }
            } elseif (request('metode') == 'metode_efektif') {
                $angsuran = [];
                $jumlah_kredit = str_replace('.', '', request('jumlah_kredit'));
                $sukuBunga = request('bunga_pertahun') / 100;
                $pokok = $jumlah_kredit / request('jangka_waktu');
                $sisaPinjaman = $jumlah_kredit;

                for ($i = 0; $i < request('jangka_waktu'); $i++) {
                    $bunga = $sisaPinjaman * $sukuBunga * (HARI_BULAN / HARI_TAHUN);
                    $jumlahAngsuran = ($pokok + $bunga);
                    $sisaPinjaman -= $pokok;
                    array_push($angsuran, [
                        "no"                => $i + 1,
                        "pokok"             => round($pokok),
                        "bunga"             => round($bunga),
                        "jumlahAngsuran"    => round($jumlahAngsuran),
                        "sisaPinjaman"      => round($sisaPinjaman)
                    ]);
                }
            } elseif (request('metode') == 'metode_anuitas') {
                $angsuran = [];
                $sukuBunga = request('bunga_pertahun') / 100;
                $pokok = request('jumlah_kredit') * (request('bunga_pertahun') / 12);
                $sisaPinjaman = request('jumlah_kredit');

                for ($i = 0; $i < request('jangka_waktu'); $i++) {
                    $jumlahAngsuran = $pokok / pow(1 - (1 + (1 / 12)), -request('jangka_waktu'));
                    $bunga = ($jumlahAngsuran - $pokok);
                    $sisaPinjaman -= $jumlahAngsuran;
                    $pokok = $pokok - $jumlahAngsuran * (request('bunga_pertahun') / 12);
                    array_push($angsuran, [
                        "no"                => $i + 1,
                        "pokok"             => round($pokok),
                        "bunga"             => round($bunga),
                        "jumlahAngsuran"    => round($jumlahAngsuran),
                        "sisaPinjaman"      => round($sisaPinjaman)
                    ]);
                }
            }
            return view('landing-page.kredit.simulasi-kredit', compact('angsuran'));
        } else {
            return view('landing-page.kredit.simulasi-kredit', compact('angsuran'));
        }
    }
}
