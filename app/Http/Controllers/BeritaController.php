<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kategori;
use App\Models\ProfileCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $berita_s = Berita::with('kategori')->get();
            return datatables()->of($berita_s)
                ->addIndexColumn()
                ->addColumn('judul', 'berita.judul')
                ->addColumn('kategori', 'berita.kategori')
                ->addColumn('action', 'berita.action')
                ->addColumn('status', 'berita.status')
                ->rawColumns(['judul', 'kategori', 'action', 'status'])
                ->make(true);
        }

        return view('berita.index');
    }

    public function create()
    {
        $kategori_s = Kategori::orderBy('kategori', 'asc')->get();
        return view('berita.create', compact('kategori_s'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'required|image|max:2048',
            'kategori' => 'required',
        ], [
            'judul.required' => 'bidang judul wajib di isi!',
            'konten.required' => 'bidang konten wajib di isi!',
            'gambar.required' => 'bidang gambar wajib di isi!',
            'gambar.image' => 'format file wajib gambar!',
            'gambar.max' => 'maksimal size gambar hanya 2 MB!',
            'kategori.required' => 'bidang kategori wajib di isi!',
        ]);

        $imgName = "";

        if ($request->gambar) {
            $imgName = Str::random(20) . '-' . time() . '.' . $request->gambar->clientExtension();
            $request->gambar->move(public_path('asset-berita'), $imgName);
        }

        Berita::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori,
            'konten' => $request->konten,
            'gambar' => $imgName,
            'slug' => Str::slug(Str::random(10) . '-' . $request->judul, '-'),
        ]);

        return redirect()->route('berita')->with('success', 'Berita berhasil ditambah!');
    }

    public function edit(Berita $berita)
    {
        $kategori_s = Kategori::orderBy('kategori', 'asc')->get();
        return view('berita.edit', compact('berita', 'kategori_s'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'image|max:2048',
            'kategori' => 'required',
        ], [
            'judul.required' => 'bidang judul wajib di isi!',
            'konten.required' => 'bidang konten wajib di isi!',
            'gambar.image' => 'format file wajib gambar!',
            'gambar.max' => 'maksimal size gambar hanya 2 MB!',
            'kategori.required' => 'bidang kategori wajib di isi!',
        ]);

        $imgName = $request->gambar_old;

        if ($request->gambar) {
            $file = public_path('asset-berita/') . $request->gambar_old;
            if ($file) {
                @unlink($file);
            }
            $imgName = Str::random(20) . '-' . time() . '.' . $request->gambar->clientExtension();
            $request->gambar->move(public_path('asset-berita'), $imgName);
        }

        Berita::where('slug', $request->berita_slug)->update([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori,
            'konten' => $request->konten,
            'gambar' => $imgName,
        ]);

        return redirect()->route('berita')->with('success', 'Berita berhasil diubah!');
    }

    public function destroy(Berita $berita)
    {
        $file = public_path('asset-berita/') . $berita->gambar;
        if ($file) {
            @unlink($file);
        }

        Berita::destroy($berita->id);

        return redirect()->route('berita')->with('success', 'Berita berhasil dihapus!');
    }

    public function status(Berita $berita, Request $request)
    {

        $berita->update([
            'status' => $request->status,
            'published' => date("Y-m-d"),
        ]);

        return redirect()->route('berita')->with('success', 'Status berita berhasil diubah!');
    }



    // Landing Page

    public function pageBerita()
    {
        $berita_s = Berita::with('kategori')->where('status', true)->orderBy('published', 'desc');
        if (request('cari')) {
            $berita_s->where('judul', 'LIKE', '%' . request('cari') . '%');
        }

        if (request('kategori')) {
            $berita_s->whereHas('kategori', function ($query) {
                $query->where('slug', request('kategori'));
            });
        }

        $berita_list_right = Berita::inRandomOrder()->limit(4)->get();
        $kategori_s = Kategori::orderBy('kategori', 'asc')->get();
        $profileCompany = ProfileCompany::first();

        return view('landing-page.berita.index', [
            'berita_list_right' => $berita_list_right,
            'kategori_s' => $kategori_s,
            'berita_s' => $berita_s->paginate(6)->withQueryString(),
            'profileCompany' => $profileCompany,
        ]);
    }

    public function detailBerita(Berita $berita)
    {
        $berita_s = Berita::where('id', '!=', $berita->id)->inRandomOrder()->limit(6)->get();
        $kategori_s = Kategori::orderBy('kategori', 'asc')->get();
        return view('landing-page.berita.detail-berita', compact('berita', 'berita_s', 'kategori_s'));
    }
}
