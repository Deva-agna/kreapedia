<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('about.index', compact('about'));
    }

    public function edit()
    {
        $about = About::first();
        return view('profile-company.about', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'video' => 'required|max:255',
            'kata_pengantar' => 'required',
            'deskripsi' => 'required',
            'konten' => 'required',
            'gambar' => 'image|max:2048',
        ], [
            'title.required' => 'Bidang title wajib di isi!',
            'title.max' => 'Title maksimal 100 karakter',
            'video.required' => 'Bidang video wajib di isi!',
            'video.max' => 'Video maksimal 255 karakter',
            'kata_pengantar.required' => 'Bidang kata pengantar wajib di isi!',
            'deskripsi.required' => 'Bidang deskripsi wajin di isi!',
            'konten.required' => 'Bidang konten wajib di isi!',
            'gambar.max' => 'Size gambar maksimal 2 MB!',
            'gambar.image' => 'File yang diupload wajib gambar!'
        ]);

        $about = About::where('slug', $request->about_slug)->first();

        $imgName = $about->gambar;

        if ($request->gambar_old == "" && $imgName != "") {
            $file = public_path('asset-about/') . $imgName;
            if ($file) {
                @unlink($file);
            }
            $imgName = "";
        }

        if ($request->gambar) {
            $file = public_path('asset-about/') . $imgName;
            if ($file) {
                @unlink($file);
            }
            $imgName = Str::random(20) . '.' . time() . '.' . $request->gambar->clientExtension();
            $request->gambar->move(public_path('asset-about'), $imgName);
        }

        $about->update([
            'title' => $request->title,
            'video' => $request->video,
            'kata_pengantar' => $request->kata_pengantar,
            'deskripsi' => $request->deskripsi,
            'konten' => $request->konten,
            'gambar' => $imgName,
            'slug' => Str::slug($request->title, '-'),
        ]);

        return redirect()->back()->with('success', 'Data about us berhasil diubah!');
    }

    public function editVisiMisi()
    {
        $about = About::first(['slug', 'visi', 'misi']);
        return view('profile-company.visi-misi', compact('about'));
    }

    public function updateVisiMisi(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ], [
            'visi.required' => 'Bidang visi perusahaan wajib di isi!',
            'misi.required' => 'Bidang misi perusahaan wajib di isi!',
        ]);

        About::where('slug', $request->about_slug)->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->back()->with('success', 'Data Visi & Misi berhasil diubah!');
    }
}
