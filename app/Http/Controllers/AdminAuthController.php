<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    /**
     * --------------------------
     * VERIFIKASI reCAPTCHA v2
     * --------------------------
     */
    protected function verifyCaptcha($captchaToken)
    {
        try {
            $secretKey = config('services.recaptcha.secret_key');
            
            $response = \Illuminate\Support\Facades\Http::asForm()->post(
                'https://www.google.com/recaptcha/api/siteverify',
                [
                    'secret' => $secretKey,
                    'response' => $captchaToken,
                ]
            );

            $body = $response->json();
            
            // reCAPTCHA v2 mengembalikan success true/false
            return isset($body['success']) && $body['success'] === true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * --------------------------
     * TAMPIL FORM LOGIN ADMIN
     * --------------------------
     */
    public function loginForm()
    {
        return view('auth.login-admin');
    }

    /**
     * --------------------------
     * PROSES LOGIN ADMIN
     * --------------------------
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required'
        ], [
            'email.required' => 'Email wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'g-recaptcha-response.required' => 'Verifikasi reCAPTCHA diperlukan.'
        ]);

        // Verifikasi reCAPTCHA
        $captchaResponse = $this->verifyCaptcha($request->input('g-recaptcha-response'));
        if (!$captchaResponse) {
            return back()->withErrors([
                'g-recaptcha-response' => 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.'
            ])->withInput();
        }

        $credentials = $request->only('email', 'password');

        // Hanya role admin yang boleh login di controller ini
        if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard')
                ->with('success', 'Login admin berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah, atau Anda tidak memiliki akses admin.'
        ])->withInput();
    }
}