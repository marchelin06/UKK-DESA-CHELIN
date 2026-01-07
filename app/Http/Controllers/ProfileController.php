<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil user
     * Jika NIK dan No HP belum lengkap dan user adalah warga, arahkan ke edit
     */
    public function show()
    {
        $user = Auth::user();
        
        // Jika data belum lengkap dan user adalah warga, arahkan ke form edit
        if (($user->nik == null || $user->no_hp == null) && $user->role === 'warga') {
            return redirect()->route('profile.edit')
                ->with('info', 'Silakan lengkapi data diri Anda terlebih dahulu.');
        }
        
        return view('profile.show', ['user' => $user]);
    }

    /**
     * Menampilkan form edit profil (untuk melengkapi NIK dan No HP)
     */
    public function edit()
    {
        // Hanya untuk warga
        if (Auth::user()->role !== 'warga') {
            abort(403, 'Unauthorized. Halaman ini hanya untuk warga.');
        }

        $user = Auth::user();
        return view('profile.edit', ['user' => $user]);
    }

    /**
     * Update data profil user (NIK dan No HP)
     */
    public function update(Request $request)
    {
        // Hanya untuk warga
        if (Auth::user()->role !== 'warga') {
            abort(403, 'Unauthorized. Halaman ini hanya untuk warga.');
        }

        $user = Auth::user();

        // Validasi NIK dan No HP
        $validated = $request->validate([
            'nik'   => 'required|string|digits:16',
            'no_hp' => 'required|string|min:10|max:13',
        ], [
            'nik.required'   => 'NIK wajib diisi.',
            'nik.digits'     => 'NIK harus 16 digit.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.min'      => 'Nomor HP minimal 10 digit.',
            'no_hp.max'      => 'Nomor HP maksimal 13 digit.',
        ]);

        // Validasi format no_hp tambahan (harus dimulai dengan 0 atau +62)
        $no_hp = str_replace(' ', '', $validated['no_hp']); // Hapus spasi jika ada
        if (!preg_match('/^(0)[0-9]{9,12}$/', $no_hp)) {
            return back()->withErrors(['no_hp' => 'Format nomor HP tidak valid. Harus dimulai dengan 0 (contoh: 08123456789)'])->withInput();
        }

        $user->update([
            'nik'   => $validated['nik'],
            'no_hp' => $no_hp,
        ]);

        return redirect()->route('profile.show')
            ->with('success', 'Data diri Anda berhasil disimpan!');
    }
}
