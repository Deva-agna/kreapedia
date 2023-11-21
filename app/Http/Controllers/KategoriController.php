<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {

        if (request()->ajax()) {
            $kategori_s = Kategori::get();
            return datatables()->of($kategori_s)
                ->addIndexColumn()
                ->addColumn('kategori', 'kategori-berita.kategori')
                ->addColumn('action', 'kategori-berita.action')
                ->rawColumns(['kategori', 'action'])
                ->make(true);
        }

        return view('kategori-berita.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'kategori' => 'required|max:10|unique:kategoris',
            'warna' => 'required'
        ], [
            'icon.required' => 'Bidang icon wajib di isi.',
            'kategori.required' => 'Bidang kategori wajib di isi.',
            'kategori.max' => 'Maksimal 10 karakter.',
            'kategori.unique' => 'Kategori sudah terdaftar.',
            'warna.required' => 'Bidang warna wajib di isi!'
        ]);

        Kategori::create([
            'icon' => $request->icon,
            'kategori' => $request->kategori,
            'warna' => $request->warna,
            'slug' => Str::slug(Str::random(10) . '-' . $request->kategori, '-'),
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambah!');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori-berita.edit', compact('kategori'));
    }

    public function update(Request $request)
    {
        $kategori = Kategori::where('slug', $request->slug)->first();

        $request->validate([
            'icon' => 'required',
            'kategori' => 'required|max:10|unique:kategoris,kategori,' . $kategori->id,
            'warna' => 'required'
        ], [
            'icon.required' => 'Bidang icon wajib di isi.',
            'kategori.required' => 'Bidang kategori wajib di isi.',
            'kategori.max' => 'Maksimal 10 karakter.',
            'kategori.unique' => 'Kategori sudah terdaftar.',
            'warna.required' => 'Bidang warna wajib di isi!'
        ]);

        Kategori::where('id', $kategori->id)->update([
            'icon' => $request->icon,
            'kategori' => $request->kategori,
            'warna' => $request->warna
        ]);

        return redirect()->route('kategori')->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy(Kategori $kategori)
    {
        if ($kategori->berita->count() > 0) {
            return redirect()->back()->with('informasi', 'Kategori tidak dapat dihapus karena kategori digunakan pada data berita!');
        } else {
            Kategori::destroy($kategori->id);
            return redirect()->back()->with('success', 'Kategori berhasil dihapus!');
        }
    }
}
