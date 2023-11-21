<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\ProfileCompany;
use Carbon\Carbon;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $event_s = Event::get();
            return datatables()->of($event_s)
                ->addIndexColumn()
                ->addColumn('event', 'event.event')
                ->addColumn('waktu', 'event.waktu')
                ->addColumn('status', 'event.status')
                ->addColumn('action', 'event.action')
                ->rawColumns(['event', 'waktu', 'status', 'action'])
                ->make(true);
        }

        return view('event.index');
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'event' => 'required',
            'waktu' => 'required|min:11',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|max:2048',
        ], [
            'event.required' => 'Bidang event wajib di isi!',
            'waktu.required' => 'Bidang event berlangsung wajib di isi!',
            'waktu.min' => 'Harap isi waktu berlangsung dengan benar!',
            'lokasi.required' => 'Bidang lokasi wajib di isi!',
            'deskripsi.required' => 'Bidang deskripsi wajib di isi!',
            'gambar.required' => 'Bidang gambar wajib di isi!',
            'gambar.max' => 'Size gambar maksimal 2 MB!',
            'gambar.image' => 'File yang diupload wajib gambar!'
        ]);

        $imgName = "";
        if ($request->gambar) {
            $imgName = Str::random(20) . '.' . time() . '.' . $request->gambar->clientExtension();
            $request->gambar->move(public_path('asset-event'), $imgName);
        }

        $waktu_mulai = substr($request->waktu, 0, 10);
        $waktu_selesai = substr($request->waktu, 14, 25);

        Event::create([
            'judul' => $request->event,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $waktu_mulai,
            'tanggal_selesai' => $waktu_selesai,
            'lokasi' => $request->lokasi,
            'gambar' => $imgName,
            'status' => 'pending',
            'slug' => Str::slug($request->event . '-' . time(), '-'),
        ]);

        return redirect()->route('event')->with('success', 'Data event berhasil ditambah!');
    }

    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'event' => 'required',
            'waktu' => 'required|min:11',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|max:2048',
        ], [
            'event.required' => 'Bidang event wajib di isi!',
            'waktu.required' => 'Bidang event berlangsung wajib di isi!',
            'waktu.min' => 'Harap isi waktu berlangsung dengan benar!',
            'lokasi.required' => 'Bidang lokasi wajib di isi!',
            'deskripsi.required' => 'Bidang deskripsi wajib di isi!',
            'gambar.max' => 'Size gambar maksimal 2 MB!',
            'gambar.image' => 'File yang diupload wajib gambar!'
        ]);

        $imgName = $request->gambar_old;
        if ($request->gambar) {
            $file = public_path('asset-event/') . $request->gambar_old;
            if ($file) {
                @unlink($file);
            }
            $imgName = Str::random(20) . '.' . time() . '.' . $request->gambar->clientExtension();
            $request->gambar->move(public_path('asset-event'), $imgName);
        }

        $waktu_mulai = substr($request->waktu, 0, 10);
        $waktu_selesai = substr($request->waktu, 14, 25);

        Event::where('slug', $request->event_slug)->update([
            'judul' => $request->event,
            'deskripsi' => $request->deskripsi,
            'tanggal_mulai' => $waktu_mulai,
            'tanggal_selesai' => $waktu_selesai,
            'lokasi' => $request->lokasi,
            'gambar' => $imgName,
            'slug' => Str::slug($request->event . '-' . time(), '-'),
        ]);

        return redirect()->route('event')->with('success', 'Data event berhasil diubah!');
    }

    public function destroy(Event $event)
    {
        $file = public_path('asset-event/') . $event->gambar;
        if ($file) {
            @unlink($file);
        }

        Event::destroy($event->id);

        return redirect()->route('event')->with('success', 'Data event berhasil dihapus!');
    }

    public function status(Event $event, Request $request)
    {
        if (strtotime(date("Y-m-d")) <= strtotime($event->tanggal_selesai)) {
            $event->update([
                'status' => $request->status,
            ]);
            return redirect()->route('event')->with('success', 'Status event berhasil diubah!');
        } else {
            return redirect()->route('event')->with('informasi', 'Status event tidak dapat diubah karna tanggal kadaluarsa!');
        }
    }


    // Landing Page Event

    public function pageEvent()
    {
        $event_s = Event::latest()->paginate(12);
        $profileCompany = ProfileCompany::first();

        return view('landing-page.event.index', compact('event_s', 'profileCompany'));
    }

    public function detailEvent(Event $event)
    {
        $profileCompany = ProfileCompany::first();
        return view('landing-page.event.detail-event', compact('event', 'profileCompany'));
    }
}
