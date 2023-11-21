<?php

namespace App\Http\Controllers;

use App\Models\WelcomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WelcomeSectionController extends Controller
{
    public function index()
    {
        $welcomeSection = WelcomeSection::first();
        return view('welcome-section.index', compact('welcomeSection'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kalimat_pertama' => 'required|max:30',
            'kalimat_kedua' => 'required|max:20',
            'caption' => 'required|max:255',
            'gambar' => 'image|max:2048',
        ], [
            'kalimat_pertama.required' => 'Bidang kalimat pertama wajib di isi!',
            'kalimat_pertama.max' => 'Kalimat pertama maksimal 30 karakter!',
            'kalimat_kedua.required' => 'Bidang kalimat kedua wajib di isi!',
            'kalimat_kedua.max' => 'Kalimat kedua maksimal 20 karakter!',
            'caption.required' => 'Bidang caption wajib di isi!',
            'caption.max' => 'Caption maksimal 255 karakter!',
            'gambar.max' => 'Size gambar maksimal 2 MB!',
            'gambar.image' => 'File yang diupload wajib gambar!'
        ]);

        $welcomeSection = WelcomeSection::where('slug', $request->welcome_section_slug)->first();

        $imgName = $welcomeSection->gambar;

        if ($request->gambar_old == "" && $imgName != "") {
            $file = public_path('asset-welcome-section/') . $imgName;
            if ($file) {
                @unlink($file);
            }
            $imgName = "";
        }

        if ($request->gambar) {
            $file = public_path('asset-welcome-section/') . $imgName;
            if ($file) {
                @unlink($file);
            }
            $imgName = Str::random(20) . '.' . time() . '.' . $request->gambar->clientExtension();
            $request->gambar->move(public_path('asset-welcome-section'), $imgName);
        }

        $welcomeSection->update([
            'kalimat_pertama' => $request->kalimat_pertama,
            'kalimat_kedua' => $request->kalimat_kedua,
            'caption' => $request->caption,
            'gambar' => $imgName,
            'slug' => Str::slug($request->kalimat_pertama . '-' . $request->kalimat_kedua . '-' . time(), '-'),
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah!');
    }
}
