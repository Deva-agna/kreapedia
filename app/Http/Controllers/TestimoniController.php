<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestimoniController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $testimoni_s = Testimoni::get();
            return datatables()->of($testimoni_s)
                ->addIndexColumn()
                ->addColumn('status', 'testimoni.status')
                ->addColumn('action', 'testimoni.action')
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('testimoni.index');
    }

    public function create()
    {
        return view('testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'job' => 'max:70',
            'ulasan' => 'required|max:255',
            'gambar' => 'image|max:2048'
        ], [
            'nama.required' => 'Bidang nama wajib di isi!',
            'nama.max' => 'Nama maksimal 50 karakter!',
            'job.max' => 'Job maksimal 70 karakter!',
            'ulasan.required' => 'Bidang ulasan wajib di isi!',
            'ulasan.max' => 'Ulasan maksimal 255 karakter!',
            'gambar.max' => 'Size gambar maksimal 2 MB!',
            'gambar.image' => 'File yang diupload wajib gambar!'
        ]);

        $imgName = "";
        if ($request->gambar) {
            $imgName = Str::random(20) . '.' . time() . '.' . $request->gambar->clientExtension();
            $request->gambar->move(public_path('asset-testimoni'), $imgName);
        }

        Testimoni::create([
            'nama' => $request->nama,
            'job' => $request->job,
            'ulasan' => $request->ulasan,
            'gambar' => $imgName,
            'slug' => Str::slug($request->nama . '-' . time(), '-'),
        ]);

        return redirect()->route('testimoni')->with('success', 'Data testimoni berhasil ditambah!');
    }

    public function edit(Testimoni $testimoni)
    {
        return view('testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'job' => 'max:70',
            'ulasan' => 'required|max:255',
            'gambar' => 'image|max:2048'
        ], [
            'nama.required' => 'Bidang nama wajib di isi!',
            'nama.max' => 'Nama maksimal 50 karakter!',
            'job.max' => 'Job maksimal 70 karakter!',
            'ulasan.required' => 'Bidang ulasan wajib di isi!',
            'ulasan.max' => 'Ulasan maksimal 255 karakter!',
            'gambar.max' => 'Size gambar maksimal 2 MB!',
            'gambar.image' => 'File yang diupload wajib gambar!'
        ]);

        $testimoni = Testimoni::where('slug', $request->testimoni_slug)->first();

        $imgName = $testimoni->gambar;

        if ($request->gambar_old == "" && $imgName != "") {
            $file = public_path('asset-testimoni/') . $imgName;
            if ($file) {
                @unlink($file);
            }
            $imgName = "";
        }

        if ($request->gambar) {
            $file = public_path('asset-testimoni/') . $imgName;
            if ($file) {
                @unlink($file);
            }
            $imgName = Str::random(20) . '.' . time() . '.' . $request->gambar->clientExtension();
            $request->gambar->move(public_path('asset-testimoni'), $imgName);
        }

        $testimoni->update([
            'nama' => $request->nama,
            'job' => $request->job,
            'ulasan' => $request->ulasan,
            'gambar' => $imgName,
            'slug' => Str::slug($request->nama . '-' . time(), '-'),
        ]);

        return redirect()->route('testimoni')->with('success', 'Data testimoni berhasil diubah!');
    }

    public function destroy(Testimoni $testimoni)
    {
        $file = public_path('asset-testimoni/') . $testimoni->gambar;
        if ($file) {
            @unlink($file);
        }

        Testimoni::destroy($testimoni->id);
        return redirect()->route('testimoni')->with('success', 'Data testimoni berhasil dihapus!');
    }

    public function status(Testimoni $testimoni, Request $request)
    {
        $testimoni_count = Testimoni::where('status', true)->count();

        if ($testimoni_count > 1 && $request->status == false) {
            $testimoni->update([
                'status' => false,
            ]);
            return redirect()->route('testimoni')->with('success', 'Status testimoni berhasil diubah!');
        } elseif ($testimoni_count < 10 && $request->status == true) {
            $testimoni->update([
                'status' => true,
            ]);
            return redirect()->route('testimoni')->with('success', 'Status testimoni berhasil diubah!');
        } else {
            return redirect()->route('testimoni')->with('informasi', 'Minimal 1 testimoni yang active, dan maksimal 10');
        }
    }
}
