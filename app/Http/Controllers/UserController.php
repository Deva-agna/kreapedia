<?php

namespace App\Http\Controllers;

use App\Models\ProfileCompany;
use App\Models\User;
use App\Models\UserActive;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $user_s = User::where('id', '!=', Auth()->user()->id)->get();
        if (request()->ajax()) {
            return datatables()->of($user_s)
                ->addIndexColumn()
                ->addColumn('nama', function ($row) {
                    $url = asset('foto/default.png');
                    if ($row->image) {
                        $url = asset('foto/' . $row->image);
                    }
                    $nama = '<img src=' . $url . ' class="mr-75 rounded-circle" height="40" width="40" alt="Angular" style="object-fit:cover;">';
                    $nama .= '<span class="font-weight-bold">' . $row->nama . '</span>';
                    return $nama;
                })
                ->addColumn('email', function ($row) {
                    $email = '<span>' . $row->email . '</span>';
                    return $email;
                })
                ->addColumn('tanggal_lahir', function ($row) {
                    $tanggal_lahir = Carbon::createFromFormat('Y-m-d', $row->tanggal_lahir)->format('d-m-Y');
                    return $tanggal_lahir;
                })
                ->addColumn('level', function ($row) {
                    if ($row->role == 'sadmin') {
                        $level = '<span class="badge badge-pill badge-light-primary mr-1">Super Admin</span>';
                    } elseif ($row->role == 'admin') {
                        $level = '<span class="badge badge-pill badge-light-info mr-1">Admin</span>';
                    } else {
                        $level = '<span class="badge badge-pill badge-light-warning mr-1">Tim</span>';
                    }
                    return $level;
                })
                ->addColumn('action', 'user.action')
                ->addColumn('status', 'user.status')
                ->rawColumns(['nama', 'email', 'tanggal_lahir', 'level', 'action', 'status'])
                ->make(true);
        }
        return view('user.index');
    }

    public function store(Request $request)
    {
        $imgName = "";
        $status = true;

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'no_wa' => 'required|numeric|digits_between:11,14|unique:users',
            'job' => 'required',
            'tanggal_lahir' => 'required|date',
            'role' => 'required',

        ], [
            'nama.required' => 'Bidang nama tidak boleh kosong.',
            'email.required' => 'Bidang email tidak boleh kosong.',
            'email.email' => 'Format email tidak sesuai.',
            'email.unique' => 'Email sudah terdaftar.',
            'no_wa.required' => 'Bidang No HP wajib di isi!',
            'no_wa.digits_between' => 'No HP harus antara 11 dan 14 digit!',
            'no_wa.numeric' => 'Isi hanya dengan angka!',
            'no_wa.unique' => 'No HP sudah terdaftar.',
            'job.required' => 'Bidang job wajib di isi!',
            'tanggal_lahir.required' => 'Bidang tanggal lahir tidak boleh kosong.',
            'role.required' => 'Harap pilih level user.',
        ]);

        if ($request->foto_user) {
            $imgName = Str::random(10) . '.' . time() . '.' . $request->foto_user->extension();
            $request->foto_user->move(public_path('foto'), $imgName);
        }

        $tanggal_lahir = date('d-m-Y', strtotime($request->tanggal_lahir));

        if ($request->role == "tim") {
            $status = false;
        }

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'job' => $request->job,
            'password' => Hash::make($tanggal_lahir),
            'tanggal_lahir' => $request->tanggal_lahir,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'role' => $request->role,
            'status' => $status,
            'image' => $imgName,
            'slug' => Str::of($request->nama . '-' . time())->slug('-'),
        ]);

        return redirect()->back()->with('success', 'Data user berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $status = true;
        $user = User::where('slug', $request->slug)->first();

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_wa' => 'required|numeric|digits_between:11,14|unique:users,no_wa,' . $user->id,
            'job' => 'required',
            'tanggal_lahir' => 'required|date',
            'role' => 'required',
        ], [
            'nama.required' => 'Bidang nama tidak boleh kosong.',
            'email.required' => 'Bidang email tidak boleh kosong.',
            'email.email' => 'Format email tidak sesuai.',
            'no_wa.required' => 'Bidang No HP wajib di isi!',
            'no_wa.digits_between' => 'No HP harus antara 11 dan 14 digit!',
            'no_wa.numeric' => 'Isi hanya dengan angka!',
            'no_wa.unique' => 'No HP sudah terdaftar.',
            'job.required' => 'Bidang job wajib di isi!',
            'tanggal_lahir.required' => 'Bidang tanggal lahir tidak boleh kosong.',
            'role.required' => 'Harap pilih level user.',
            'email.unique' => 'Email sudah terdaftar.',
        ]);

        $imgName = $user->image;

        if ($request->old_foto == "" && $imgName != "") {
            $file = public_path('foto/') . $imgName;
            if ($file) {
                @unlink($file);
            }
            $imgName = "";
        }

        if ($request->foto) {
            $file = public_path('foto/') . $imgName;
            if ($file) {
                @unlink($file);
            }
            $imgName = Str::random(10) . '.' . time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('foto'), $imgName);
        }

        if ($request->role == "tim") {
            $status = false;
        }

        $password = $user->password;

        if ($request->tanggal_lahir != $user->tanggal_lahir) {
            if (Hash::check(date('d-m-Y', strtotime($user->tanggal_lahir)), $user->password)) {
                $password = Hash::make(date('d-m-Y', strtotime($request->tanggal_lahir)));
            }
        }

        User::where('id', $user->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'job' => $request->job,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => $password,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'role' => $request->role,
            'status' => $status,
            'image' => $imgName,
        ]);

        return redirect()->route('user')->with('success', 'Data user berhasil diubah.');
    }

    public function resetPass(User $user)
    {
        $tanggal_lahir = date('d-m-Y', strtotime($user->tanggal_lahir));
        User::where('id', $user->id)->update([
            'password' => Hash::make($tanggal_lahir),
        ]);

        return redirect()->route('user')->with('success', 'Password user berhasil direset!.');
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);

        return redirect()->back()->with('success', 'Data user berhasil dihapus.');
    }

    public function status(User $user, Request $request)
    {
        $userActiveCount = UserActive::count();
        if ($request->status) {
            if ($userActiveCount < 5) {
                UserActive::create([
                    'user_id' => $user->id,
                ]);
            } else {
                return redirect()->back()->with('informasi', 'Sudah terdapat 5 user yang active!');
            }
        } else {

            UserActive::where('user_id', $user->id)->delete();
        }

        return redirect()->back()->with('success', 'Status user berhasil diubah!');
    }

    // Profile

    public function profileEdit()
    {
        return view('user.edit-profile');
    }

    public function profileUpdate(Request $request)
    {
        $user = User::where('slug', $request->slug)->first();

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_wa' => 'required|numeric|digits_between:11,14|unique:users,no_wa,' . $user->id,
            'job' => 'required',
            'tanggal_lahir' => 'required|date',
        ], [
            'nama.required' => 'Bidang nama tidak boleh kosong.',
            'email.required' => 'Bidang email tidak boleh kosong.',
            'email.email' => 'Format email tidak sesuai.',
            'no_wa.required' => 'Bidang No HP wajib di isi!',
            'no_wa.digits_between' => 'No HP harus antara 11 dan 14 digit!',
            'no_wa.numeric' => 'Isi hanya dengan angka!',
            'no_wa.unique' => 'No HP sudah terdaftar.',
            'job.required' => 'Bidang job wajib di isi!',
            'tanggal_lahir.required' => 'Bidang tanggal lahir tidak boleh kosong.',
            'email.unique' => 'Email sudah terdaftar.',
        ]);

        $imgName = $user->image;

        if ($request->old_foto == "" && $imgName != "") {
            $file = public_path('foto/') . $imgName;
            if ($file) {
                @unlink($file);
            }
            $imgName = "";
        }

        if ($request->foto) {
            $file = public_path('foto/') . $imgName;
            if ($file) {
                @unlink($file);
            }
            $imgName = Str::random(10) . '.' . time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('foto'), $imgName);
        }

        $password = $user->password;

        if ($request->tanggal_lahir != $user->tanggal_lahir) {
            if (Hash::check(date('d-m-Y', strtotime($user->tanggal_lahir)), $user->password)) {
                $password = Hash::make(date('d-m-Y', strtotime($request->tanggal_lahir)));
            }
        }

        User::where('id', $user->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_wa' => $request->no_wa,
            'job' => $request->job,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => $password,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'image' => $imgName,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diubah.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with("success", "Password changed successfully!");
    }
}
