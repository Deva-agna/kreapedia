<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\KategoriFaq;
use App\Models\ProfileCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FaqController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $faq_s = Faq::get();
            return datatables()->of($faq_s)
                ->addIndexColumn()
                ->addColumn('faq', 'faq.faq')
                ->addColumn('action', 'faq.action')
                ->addColumn('kategori', 'faq.kategori')
                ->rawColumns(['action', 'kategori', 'faq'])
                ->make(true);
        }
        return view('faq.index');
    }

    public function create()
    {
        $kategoriFaq_s = KategoriFaq::orderBy('kategori', 'asc')->get();
        return view('faq.create', compact('kategoriFaq_s'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|max:150',
            'kategori' => 'required',
            'penjelasan' => 'required',
        ], [
            'pertanyaan.required' => 'Bidang pertanyaan wajib di isi!',
            'pertanyaan.max' => 'Pertanyaan maksimal 150 karakter!',
            'kategori.required' => 'Bidang kategori wajib di isi!',
            'penjelasan.required' => 'Bidang penjelasan wajib di isi!',
        ]);

        Faq::create([
            'pertanyaan' => $request->pertanyaan,
            'kategori_faq_id' => $request->kategori,
            'penjelasan' => $request->penjelasan,
            'slug' => Str::slug($request->pertanyaan . '-' . time(), '-'),
        ]);

        return redirect()->route('faq')->with('success', 'Data FAQ berhasil ditambah!');
    }

    public function edit(Faq $faq)
    {
        $kategoriFaq_s = KategoriFaq::orderBy('kategori', 'asc')->get();
        return view('faq.edit', compact('faq', 'kategoriFaq_s'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|max:150',
            'kategori' => 'required',
            'penjelasan' => 'required',
        ], [
            'pertanyaan.required' => 'Bidang pertanyaan wajib di isi!',
            'pertanyaan.max' => 'Pertanyaan maksimal 150 karakter!',
            'kategori.required' => 'Bidang kategori wajib di isi!',
            'penjelasan.required' => 'Bidang penjelasan wajib di isi!',
        ]);

        Faq::where('slug', $request->faq_slug)->update([
            'pertanyaan' => $request->pertanyaan,
            'kategori_faq_id' => $request->kategori,
            'penjelasan' => $request->penjelasan,
            'slug' => Str::slug($request->pertanyaan . '-' . time(), '-'),
        ]);

        return redirect()->route('faq')->with('success', 'Data FAQ berhasil diubah!');
    }

    public function destroy(Faq $faq)
    {
        Faq::destroy($faq->id);
        return redirect()->route('faq')->with('success', 'Data FAQ berhasil dihapus!');
    }


    // Landing Page FAQ

    public function pageFaq()
    {
        $kategoriFaq_s = KategoriFaq::with('faq')->latest()->get();
        $profileCompany = ProfileCompany::first();
        $profileCompany = ProfileCompany::first();
        return view('landing-page.faq.index', compact('kategoriFaq_s', 'profileCompany', 'profileCompany'));
    }
}
