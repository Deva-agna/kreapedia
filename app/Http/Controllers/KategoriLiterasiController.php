<?php

namespace App\Http\Controllers;

use App\Models\KategoriLiterasi;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class KategoriLiterasiController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $kategori_s = KategoriLiterasi::get();
            return datatables()->of($kategori_s)
                ->addIndexColumn()
                ->addColumn('action', 'kategori-literasi.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('kategori-literasi.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|max:20|unique:kategori_literasis'
        ], [
            'kategori.required' => 'Bidang kategori wajib di isi!',
            'kategori.max' => 'Kategori maksimal 20 karakter!',
            'kategori.unique' => 'Kategori sudah terdaftar!'
        ]);

        KategoriLiterasi::create([
            'kategori' => $request->kategori,
            'slug' => Str::slug(Str::random(10) . '-' . $request->kategori, '-'),
        ]);

        return redirect()->back()->with('success', 'Data kategori berhasil ditambah!');
    }

    public function edit(KategoriLiterasi $kategoriLiterasi)
    {
        return view('kategori-literasi.edit', compact('kategoriLiterasi'));
    }

    public function update(Request $request)
    {
        $kategoriLiterasi = KategoriLiterasi::where('slug', $request->kategori_slug)->first();
        $request->validate([
            'kategori' => 'required|max:20|unique:kategori_literasis,kategori,' . $kategoriLiterasi->id,
        ], [
            'kategori.required' => 'Bidang kategori wajib di isi!',
            'kategori.max' => 'Kategori maksimal 20 karakter!',
            'kategori.unique' => 'Kategori sudah terdaftar!'
        ]);

        KategoriLiterasi::where('slug', $request->kategori_slug)->update([
            'kategori' => $request->kategori,
            'slug' => Str::slug(Str::random(10) . '-' . $request->kategori, '-'),
        ]);

        return redirect()->route('kategori.literasi')->with('success', 'Data kategori berhasil diubah!');
    }

    public function destroy(KategoriLiterasi $kategoriLiterasi)
    {
        if ($kategoriLiterasi->literasi->count() > 0) {
            return redirect()->back()->with('informasi', 'Kategori tidak dapat dihapus! karena kategori digunakan pada data literasi.');
        } else {
            KategoriLiterasi::destroy($kategoriLiterasi->id);
            return redirect()->route('kategori.literasi')->with('success', 'Data kategori berhasil dihapus!');
        }
    }
}
