<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * --------------------------
     * TAMPIL FORM LOGIN USER
     * --------------------------
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * --------------------------
     * PROSES LOGIN USER
     * --------------------------
     */
    public function login(Request $request)
    {

      
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi.',
            'password.required' => 'Password wajib diisi.'
        ]);

        
        // Kredensial Login
        $credentials = $request->only('email', 'password');


        // Pastikan hanya role warga yang bisa login menggunakan AuthController
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
       
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard')
                ->with('success', 'Login berhasil!');
            }

            return redirect()->route('profile.show')
                ->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah, atau Anda bukan pengguna warga.'
        ])->withInput();
    }

    /**
     * --------------------------
     * TAMPIL FORM REGISTER
     * --------------------------
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * --------------------------
     * PROSES REGISTER USER
     * --------------------------
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.unique' => 'Email sudah digunakan.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'warga', // default
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * --------------------------
     * LOGOUT
     * --------------------------
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Anda telah logout.');
    }

    /**
     * --------------------------
     * TAMPIL FORM LUPA PASSWORD
     * --------------------------
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * --------------------------
     * KIRIM EMAIL RESET PASSWORD
     * --------------------------
     */
    public function sendPasswordResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.exists' => 'Email tidak ditemukan dalam sistem kami.'
        ]);

        // Generate token
        $token = Str::random(64);

        // Simpan token ke database
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => Hash::make($token),
                'created_at' => Carbon::now()
            ]
        );

        // Buat reset link
        $resetLink = route('password.reset', ['token' => $token, 'email' => $request->email]);

        // Kirim email (simple version - bisa disesuaikan dengan Mailable class)
        // Untuk sekarang, kita gunakan Mail::raw atau custom email
        try {
            // Gunakan Mail facade dengan array
            Mail::send([], [], function($message) use ($request, $resetLink) {
                $message->to($request->email)
                    ->subject('Reset Password - Sistem Informasi Desa Bangah')
                    ->html($this->getPasswordResetEmailHTML($resetLink, $request->email));
            });

            return back()->with('success', 'Link reset password telah dikirim ke email Anda. Silakan periksa email Anda dalam 60 menit ke depan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email. Silakan coba lagi nanti.');
        }
    }

    /**
     * --------------------------
     * TAMPIL FORM RESET PASSWORD
     * --------------------------
     */
    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * --------------------------
     * PROSES RESET PASSWORD
     * --------------------------
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.exists' => 'Email tidak ditemukan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'token.required' => 'Token tidak valid.'
        ]);

        // Cek token di database
        $resetToken = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$resetToken || !Hash::check($request->token, $resetToken->token)) {
            return back()->with('error', 'Link reset password tidak valid atau sudah expired.');
        }

        // Cek apakah token masih berlaku (60 menit)
        if (Carbon::parse($resetToken->created_at)->addMinutes(60)->isPast()) {
            // Hapus token yang sudah expired
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
            return back()->with('error', 'Link reset password sudah expired. Silakan buat request baru.');
        }

        // Update password user
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            // Hapus token setelah berhasil
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();

            return redirect()->route('login')->with('success', 'Password berhasil diatur ulang! Silakan login dengan password baru Anda.');
        }

        return back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
    }

    /**
     * --------------------------
     * HTML EMAIL UNTUK RESET PASSWORD
     * --------------------------
     */
    private function getPasswordResetEmailHTML($resetLink, $email)
    {
        return "
        <div style='font-family: Poppins, sans-serif; max-width: 600px; margin: 0 auto;'>
            <div style='background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%); color: white; padding: 40px; text-align: center; border-radius: 12px 12px 0 0;'>
                <h2 style='margin: 0; font-size: 28px; font-weight: 700;'>Reset Password</h2>
                <p style='margin: 10px 0 0 0; opacity: 0.95;'>Sistem Informasi Desa Bangah</p>
            </div>
            
            <div style='background: white; padding: 40px; border-radius: 0 0 12px 12px; border: 1px solid #e0e0e0;'>
                <p style='color: #333; font-size: 16px; line-height: 1.6; margin: 0 0 20px 0;'>
                    Halo,
                </p>
                
                <p style='color: #666; font-size: 15px; line-height: 1.6; margin: 0 0 20px 0;'>
                    Kami menerima permintaan untuk mengatur ulang password akun Anda. Silakan klik tombol di bawah untuk melanjutkan:
                </p>
                
                <div style='text-align: center; margin: 30px 0;'>
                    <a href='$resetLink' style='display: inline-block; background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%); color: white; padding: 14px 32px; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 16px;'>
                        Atur Ulang Password
                    </a>
                </div>
                
                <p style='color: #999; font-size: 13px; line-height: 1.6; margin: 20px 0;'>
                    Atau salin dan paste link berikut di browser Anda:<br>
                    <span style='color: #1b5e20; word-break: break-all;'>$resetLink</span>
                </p>
                
                <div style='background: #fff9c4; border-left: 4px solid #fbc02d; padding: 16px; border-radius: 4px; margin: 20px 0;'>
                    <p style='margin: 0; color: #856404; font-size: 14px; font-weight: 600;'>⚠️ Perhatian Penting</p>
                    <p style='margin: 8px 0 0 0; color: #856404; font-size: 13px; line-height: 1.6;'>Link ini akan berlaku selama 60 menit. Jika link sudah expired, Anda dapat membuat request reset password baru.</p>
                </div>
                
                <p style='color: #999; font-size: 13px; line-height: 1.6; margin: 20px 0 0 0;'>
                    Jika Anda tidak membuat permintaan ini, silakan abaikan email ini atau hubungi admin desa.
                </p>
            </div>
            
            <div style='background: #f5f5f5; padding: 20px; text-align: center; border-radius: 0 0 12px 12px;'>
                <p style='margin: 0; color: #999; font-size: 12px;'>
                    © " . date('Y') . " Sistem Informasi Desa Bangah. Semua Hak Dilindungi.
                </p>
            </div>
        </div>
        ";
    }
}