<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubServiceController extends Controller
{
    public function index(Service $service)
    {
        if (request()->ajax()) {
            $sub_service_s = SubService::get();
            return datatables()->of($sub_service_s)
                ->addIndexColumn()
                ->addColumn('action', 'sub-service.action')
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('sub-service.index', compact('service'));
    }

    public function create(Service $service)
    {
        return view('sub-service.create', compact('service'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_layanan' => 'required|max:50',
            'penjelasan' => 'required',
        ], [
            'sub_layanan.required' => 'Bidang sub layanan wajib di isi!',
            'sub_layanan.max' => 'Sub layanan maksimal 20 karakter!',
            'penjelasan.required' => 'Bidang penjelasan wajib di isi!',
        ]);

        $service = Service::where('slug', $request->service_slug)->first();

        SubService::create([
            'service_id' => $service->id,
            'sub_layanan' => $request->sub_layanan,
            'penjelasan' => $request->penjelasan,
            'slug' => Str::slug(Str::random(10) . '-' . $request->sub_layanan, '-'),
        ]);

        return redirect()->route('sub.service', $service->slug)->with('success', 'Data sub layanan berhasil ditambah!');
    }

    public function edit(SubService $sub_service)
    {
        return view('sub-service.edit', compact('sub_service'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sub_layanan' => 'required|max:50',
            'penjelasan' => 'required',
        ], [
            'sub_layanan.required' => 'Bidang sub layanan wajib di isi!',
            'sub_layanan.max' => 'Sub layanan maksimal 20 karakter!',
            'penjelasan.required' => 'Bidang penjelasan wajib di isi!',
        ]);

        SubService::where('slug', $request->sub_service_slug)->update([
            'sub_layanan' => $request->sub_layanan,
            'penjelasan' => $request->penjelasan,
            'slug' => Str::slug(Str::random(10) . '-' . $request->sub_layanan, '-'),
        ]);

        return redirect()->route('sub.service', $request->service_slug)->with('success', 'Data sub layanan berhasil diubah!');
    }

    public function destroy(SubService $sub_service)
    {
        SubService::destroy($sub_service->id);
        return redirect()->back()->with('success', 'Data sub layanan berhasil dihapus!');
    }
}
