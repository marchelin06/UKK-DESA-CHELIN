<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .bg-primary {
            background-color: #1b5e20;
        }

        .btn-primary {
            background: linear-gradient(135deg, #43a047 0%, #66bb6a 100%);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #2e7d32 0%, #43a047 100%);
            box-shadow: 0 8px 24px rgba(67, 160, 71, 0.4);
            transform: translateY(-3px);
        }

        .login-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #43a047;
            box-shadow: 0 0 0 5px rgba(67, 160, 71, 0.12);
        }

        @media (max-width: 600px) {
            .login-wrapper {
                padding: 16px;
            }

            .login-container {
                max-width: 100%;
            }
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="login-wrapper">
        <div class="login-container">
            <div class="w-full bg-white shadow-lg rounded-xl p-8">

                <h1 class="text-3xl font-bold text-center text-green-800 mb-8">Login User</h1>

                {{-- Pesan sukses --}}
                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4 text-sm border-l-4 border-green-500">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                {{-- Pesan error --}}
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4 text-sm border-l-4 border-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-6">
                        <label class="block font-semibold text-green-800 mb-2 text-sm">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control w-full border-2 border-green-200"
                            placeholder="Masukkan email" required autofocus>
                    </div>

                    {{-- Password --}}
                    <div class="mb-6">
                        <label class="block font-semibold text-green-800 mb-2 text-sm">Password</label>
                        <input type="password" name="password"
                            class="form-control w-full border-2 border-green-200"
                            placeholder="Masukkan password" required>
                    </div>

                    {{-- Lupa Password --}}
                    <div class="text-right mb-6">
                        <a href="{{ route('password.request') }}" class="text-green-600 hover:text-green-800 text-sm font-semibold hover:underline transition">
                            Lupa Password?
                        </a>
                    </div>

                    {{-- Tombol Login --}}
                    <button type="submit"
                        class="w-full btn-primary text-white py-3 rounded-lg font-semibold hover:opacity-90 transition duration-300">
                        Login
                    </button>

                    {{-- Link ke Register --}}
                    <p class="text-center text-sm text-gray-600 mt-6">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-green-600 font-semibold hover:text-green-800 hover:underline transition">Daftar di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

</body>

</html>