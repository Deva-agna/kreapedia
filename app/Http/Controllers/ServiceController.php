<?php

namespace App\Http\Controllers;

use App\Models\ProfileCompany;
use App\Models\Service;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $service_s = Service::get();
            return datatables()->of($service_s)
                ->addIndexColumn()
                ->addColumn('layanan', 'service.layanan')
                ->addColumn('status', 'service.status')
                ->addColumn('action', 'service.action')
                ->rawColumns(['layanan', 'status', 'action'])
                ->make(true);
        }

        return view('service.index');
    }

    public function create()
    {
        return view('service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan' => 'required|max:50',
            'deskripsi' => 'required|max:200',
            'penjelasan' => 'required',
            'gambar' => 'required|image|max:2048'
        ], [
            'layanan.required' => 'Bidang layanan wajib di isi!',
            'layanan.max' => 'Layanan maksimal 20 karakter!',
            'deskripsi.required' => 'Bidang deskripsi wajib di isi!',
            'deskripsi.max' => 'Deskripsi maksimal 100 karakter!',
            'penjelasan.required' => 'Bidang penjelasan wajib di isi!',
            'gambar.required' => 'Bidang gambar wajib di isi!',
            'gambar.max' => 'Size gambar maksimal 2 MB!',
            'gambar.image' => 'File yang diupload wajib gambar!'
        ]);

        $imgName = "";
        if ($request->gambar) {
            $imgName = Str::random(20) . '-' . time() . '.' . $request->gambar->clientExtension();
            $request->gambar->move(public_path('asset-service'), $imgName);
        }

        Service::create([
            'layanan' => $request->layanan,
            'deskripsi' => $request->deskripsi,
            'penjelasan' => $request->penjelasan,
            'gambar' => $imgName,
            'slug' => Str::slug(Str::random(10) . '-' . $request->layanan, '-'),
        ]);

        return redirect()->route('service')->with('success', 'Data layanan berhasil ditambah!');
    }

    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'layanan' => 'required|max:50',
            'deskripsi' => 'required|max:200',
            'penjelasan' => 'required',
            'gambar' => 'image|max:2048'
        ], [
            'layanan.required' => 'Bidang layanan wajib di isi!',
            'layanan.max' => 'Layanan maksimal 20 karakter!',
            'deskripsi.required' => 'Bidang deskripsi wajib di isi!',
            'deskripsi.max' => 'Deskripsi maksimal 100 karakter!',
            'penjelasan.required' => 'Bidang penjelasan wajib di isi!',
            'gambar.max' => 'Size gambar maksimal 2 MB!',
            'gambar.image' => 'File yang diupload wajib gambar!'
        ]);

        $imgName = $request->gambar_old;
        if ($request->gambar) {
            $file = public_path('asset-service/') . $request->gambar_old;
            if ($file) {
                @unlink($file);
            }
            $imgName = Str::random(20) . '-' . time() . '.' . $request->gambar->clientExtension();
            $request->gambar->move(public_path('asset-service'), $imgName);
        }

        Service::where('slug', $request->service_slug)->update([
            'layanan' => $request->layanan,
            'deskripsi' => $request->deskripsi,
            'penjelasan' => $request->penjelasan,
            'gambar' => $imgName,
        ]);

        return redirect()->route('service')->with('success', 'Data layanan berhasil diubah!');
    }

    public function destroy(Service $service)
    {
        $file = public_path('asset-service/') . $service->gambar;
        if ($file) {
            @unlink($file);
        }

        Service::destroy($service->id);
        return redirect()->route('service')->with('success', 'Data layanan berhasil dihapus!');
    }

    public function status(Service $service, Request $request)
    {
        $service_count = Service::where('status', true)->count();

        if ($service_count < 5 && $request->status == true) {
            $service->update([
                'status' => $request->status,
            ]);

            return redirect()->route('service')->with('success', 'Status layanan berhasil diubah!');
        } elseif ($service_count > 3 && $request->status == false) {
            $service->update([
                'status' => $request->status,
            ]);

            return redirect()->route('service')->with('success', 'Status layanan berhasil diubah!');
        } else {
            return redirect()->route('service')->with('informasi', 'Minimal 3 layanan active dan maksimal 5!');
        }
    }

    // Page service

    public function pageService()
    {
        $service_s = Service::orderBy('layanan', 'asc')->get();
        $profileCompany = ProfileCompany::first();
        return view('landing-page.service.index', compact('service_s', 'profileCompany'));
    }
}
