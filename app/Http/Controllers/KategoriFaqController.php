<?php

namespace App\Http\Controllers;

use App\Models\KategoriFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriFaqController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $kategori_s = KategoriFaq::get();
            return datatables()->of($kategori_s)
                ->addIndexColumn()
                ->addColumn('action', 'kategori-faq.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('kategori-faq.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|max:20|unique:kategori_faqs'
        ], [
            'kategori.required' => 'Bidang kategori wajib di isi!',
            'kategori.max' => 'Kategori maksimal 20 karakter!',
            'kategori.unique' => 'Kategori sudah terdaftar!'
        ]);

        KategoriFaq::create([
            'kategori' => $request->kategori,
            'slug' => Str::slug(Str::random(10) . '-' . $request->kategori, '-'),
        ]);

        return redirect()->back()->with('success', 'Data kategori berhasil ditambah!');
    }

    public function edit(KategoriFaq $kategoriFaq)
    {
        return view('kategori-faq.edit', compact('kategoriFaq'));
    }

    public function update(Request $request)
    {
        $kategoriFaq = KategoriFaq::where('slug', $request->kategori_slug)->first();
        $request->validate([
            'kategori' => 'required|max:20|unique:kategori_faqs,kategori,' . $kategoriFaq->id,
        ], [
            'kategori.required' => 'Bidang kategori wajib di isi!',
            'kategori.max' => 'Kategori maksimal 20 karakter!',
            'kategori.unique' => 'Kategori sudah terdaftar!'
        ]);

        KategoriFaq::where('slug', $request->kategori_slug)->update([
            'kategori' => $request->kategori,
            'slug' => Str::slug(Str::random(10) . '-' . $request->kategori, '-'),
        ]);

        return redirect()->route('kategori.faq')->with('success', 'Data kategori berhasil diubah!');
    }

    public function destroy(KategoriFaq $kategoriFaq)
    {
        if ($kategoriFaq->faq->count() > 0) {
            return redirect()->back()->with('informasi', 'Kategori tidak dapat dihapus! karena kategori digunakan pada data faq.');
        } else {
            KategoriFaq::destroy($kategoriFaq->id);
            return redirect()->route('kategori.faq')->with('success', 'Data kategori berhasil dihapus!');
        }
    }
}
