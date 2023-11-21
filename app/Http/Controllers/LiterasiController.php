<?php

namespace App\Http\Controllers;

use App\Models\KategoriLiterasi;
use App\Models\Literasi;
use App\Models\ProfileCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LiterasiController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $literasi_s = Literasi::get();
            return datatables()->of($literasi_s)
                ->addIndexColumn()
                ->addColumn('judul', 'literasi.judul')
                ->addColumn('kategori', 'literasi.kategori')
                ->addColumn('status', 'literasi.status')
                ->addColumn('action', 'literasi.action')
                ->rawColumns(['judul', 'kategori', 'status', 'action'])
                ->make(true);
        }

        return view('literasi.index');
    }

    public function create()
    {
        $kategoriLiterasi_s = KategoriLiterasi::orderBy('kategori', 'asc')->get();
        return view('literasi.create', compact('kategoriLiterasi_s'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'abstrak' => 'required',
            'keyword' => 'max:150',
            'file_pdf' => 'required|mimes:pdf|max:2048'
        ], [
            'judul.required' => 'Bidang judul wajib di isi!',
            'judul.max' => 'Judul maksimal 255 karakter!',
            'kategori.required' => 'Bidang kategori wajib di isi!',
            'abstrak.required' => 'Bidang abstrak wajib di isi!',
            'keyword.max' => 'Keyword maksimal 150 karakter!',
            'file_pdf.required' => 'Bidang file pdf wajib di isi!',
            'file_pdf.mimes' => 'File yang di upload wajib pdf!',
            'file_pdf.max' => 'File pdf maksimal size 2MB!'
        ]);

        $fileName = "";
        if ($request->file_pdf) {
            $fileName = Str::random(20) . '.' . time() . '.' . $request->file_pdf->clientExtension();
            $request->file_pdf->move(public_path('asset-literasi'), $fileName);
        }

        Literasi::create([
            'judul' => $request->judul,
            'kategori_literasi_id' => $request->kategori,
            'abstrak' => $request->abstrak,
            'keyword' => $request->keyword,
            'nama_file' => $fileName,
            'slug' => Str::slug(Str::random(20) . '-' . time(), '-'),
        ]);

        return redirect()->route('literasi')->with('success', 'Data literasi berhasil ditambah!');
    }

    public function preview(Literasi $literasi)
    {
        return view('literasi.preview', compact('literasi'));
    }

    public function edit(Literasi $literasi)
    {
        $kategoriLiterasi_s = KategoriLiterasi::orderBy('kategori', 'asc')->get();
        return view('literasi.edit', compact('literasi', 'kategoriLiterasi_s'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'abstrak' => 'required',
            'keyword' => 'max:150',
            'file_pdf' => 'mimes:pdf|max:2048'
        ], [
            'judul.required' => 'Bidang judul wajib di isi!',
            'judul.max' => 'Judul maksimal 255 karakter!',
            'kategori.required' => 'Bidang kategori wajib di isi!',
            'abstrak.required' => 'Bidang abstrak wajib di isi!',
            'keyword.max' => 'Keyword maksimal 150 karakter!',
            'file_pdf.mimes' => 'File yang di upload wajib pdf!',
            'file_pdf.max' => 'File pdf maksimal size 2MB!'
        ]);

        $fileName = $request->file_old;
        if ($request->file_pdf) {
            $file = public_path('asset-literasi/') . $request->file_old;
            if ($file) {
                @unlink($file);
            }
            $fileName = Str::random(20) . '.' . time() . '.' . $request->file_pdf->clientExtension();
            $request->file_pdf->move(public_path('asset-literasi'), $fileName);
        }

        Literasi::where('slug', $request->literasi_slug)->update([
            'judul' => $request->judul,
            'kategori_literasi_id' => $request->kategori,
            'abstrak' => $request->abstrak,
            'keyword' => $request->keyword,
            'nama_file' => $fileName,
            'slug' => Str::slug(Str::random(20) . '-' . time(), '-'),
        ]);

        return redirect()->route('literasi')->with('success', 'Data literasi berhasil diubah!');
    }

    public function status(Literasi $literasi, Request $request)
    {
        Literasi::where('id', $literasi->id)->update([
            'published' => date('Y-m-d'),
            'status' => $request->status
        ]);

        return redirect()->route('literasi')->with('success', 'Status literasi berhasil diubah!');
    }

    public function destroy(Literasi $literasi)
    {
        $file = public_path('asset-literasi/') . $literasi->nama_file;
        if ($file) {
            @unlink($file);
        }

        Literasi::destroy($literasi->id);

        return redirect()->route('literasi')->with('success', 'Data literasi berhasil dihapus!');
    }

    // Page Literasi

    public function pageLiterasi()
    {
        $literasi_s = Literasi::orderBy('published', 'desc');

        if (request('cari')) {
            $literasi_s->where('judul', 'LIKE', '%' . request('cari') . '%');
        }

        if (request('kategori')) {
            $literasi_s->whereHas('kategoriLiterasi', function ($query) {
                $query->where('slug', request('kategori'));
            });
        }

        $kategori_s = KategoriLiterasi::orderBy('kategori', 'asc')->get();
        $profileCompany = ProfileCompany::first();

        return view('landing-page.literasi.index', [
            'kategori_s' => $kategori_s,
            'literasi_s' => $literasi_s->paginate(10)->withQueryString(),
            'profileCompany' => $profileCompany,
        ]);
    }

    public function detailLiterasi(Literasi $literasi)
    {
        $profileCompany = ProfileCompany::first();
        $kategori_s = KategoriLiterasi::orderBy('kategori', 'asc')->get();
        return view('landing-page.literasi.detail-literasi', compact('literasi', 'kategori_s', 'profileCompany'));
    }
}
