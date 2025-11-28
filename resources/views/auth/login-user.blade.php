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
            background-color: #2E86C1;
        }

        .btn-primary {
            background-color: #2E86C1;
        }

        .btn-primary:hover {
            background-color: #21618C;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">

            <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Login Pengguna</h1>

            {{-- Pesan sukses --}}
            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Pesan error --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-3 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.user.post') }}" method="POST">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        placeholder="Masukkan email" required>
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label class="block font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full p-3 border rounded focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        placeholder="Masukkan password" required>
                </div>

                {{-- Tombol Login --}}
                <button type="submit"
                    class="w-full btn-primary text-white py-3 rounded-lg font-semibold hover:opacity-90 transition">
                    Login
                </button>

                {{-- Link ke Register --}}
                <p class="text-center text-sm text-gray-600 mt-4">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar di sini</a>
                </p>
            </form>
        </div>
    </div>

</body>

</html>