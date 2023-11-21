<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\ProfileCompany;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProfileCompanyController extends Controller
{
    public function index()
    {
        $profile = ProfileCompany::first();
        $about = About::first();
        return view('profile-company.index', compact('profile', 'about'));
    }

    public function edit(ProfileCompany $profileCompany)
    {
        return view('profile-company.edit', compact('profileCompany'));
    }

    public function updateInformasi(Request $request)
    {
        // return $request;
        $request->validate([
            'nama_perusahaan' => 'required|max:30',
            'alamat' => 'required|max:150',
            'kota' => 'required|max:30',
            'negara' => 'required|max:30',
            'no_wa' => 'required|numeric|digits_between:11,14',
            'email' => 'required|email',
            'gambar' => 'image|max:2048',
            'tiktok' => 'max:255',
            'instagram' => 'max:255',
            'youtube' => 'max:255',
            'facebook' => 'max:255',
            'twitter' => 'max:255',
            'telegram' => 'max:255',
        ], [
            'nama_perusahaan.required' => 'Bidang nama perusahaan wajib di isi!',
            'nama_perusahaan.max' => 'Nama perusahaan maksimal 30 karakter!',
            'alamat.required' => 'Bidang alamat wajib di isi!',
            'alamat.max' => 'Alamat maksimal 150 karakter!',
            'kota.required' => 'Bidang kota wajib di isi!',
            'kota.max' => 'Kota maksimal 30 karakter!',
            'negara.required' => 'Bidang negara wajib di isi!',
            'negara.max' => 'Negara maksimal 30 karakter!',
            'no_wa.required' => 'Bidang no whatsapp wajib di isi!',
            'no_wa.digits_between' => 'No whatsapp harus antara 11 dan 14 digit!',
            'no_wa.numeric' => 'Isi hanya dengan angka!',
            'email.required' => 'Bidang email wajib di isi!',
            'email.email' => 'Format email tidak sesuai!',
            'gambar.image' => 'Pilih file dengan format gambar!',
            'gambar.max' => 'Gambar maksimal size 2MB!',
            'tiktok.max' => 'Tiktok maksimal 255 karakter!',
            'instagram.max' => 'Instagram maksimal 255 karakter!',
            'youtube.max' => 'Youtube maksimal 255 karakter!',
            'facebook.max' => 'Facebook maksimal 255 karakter!',
            'twitter.max' => 'Twitter maksimal 255 karakter!',
            'telegram.max' => 'Telegram maksimal 255 karakter!',
        ]);

        $profileCompany = ProfileCompany::where('slug', $request->company_slug)->first();
        $imgName = $profileCompany->gambar;
        if ($request->gambar) {
            $file = public_path('app-assets/images/asset-company/') . $profileCompany->gambar;
            if ($file) {
                @unlink($file);
            }
            $imgName = Str::random(20) . '.' . time() . '.' . $request->gambar->clientExtension();
            $request->gambar->move(public_path('app-assets/images/asset-company', $imgName));
        }

        $profileCompany->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'negara' => $request->negara,
            'no_wa' => $request->no_wa,
            'email' => $request->email,
            'gambar' => $imgName,
            'tiktok' => $request->tiktok,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'telegram' => $request->telegram,
            'slug' => Str::slug($request->nama_perusahaan . '-' . time(), '-'),
        ]);

        return redirect()->route('profile.company')->with('success', 'Data perusahaan berhasil diubah!');
    }

    // Page Contact

    public function pageContact()
    {
        $profileCompany = ProfileCompany::first();
        $user_s = User::where('id', '!=', 1)->orderBy('nama', 'asc')->get();
        return view('landing-page.contact.index', compact('profileCompany', 'user_s'));
    }
}
