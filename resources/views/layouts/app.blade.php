<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Sistem Informasi Desa') }}</title>

    {{-- Tailwind CSS CDN (biar tampilan rapi) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Tambahan style opsional --}}
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
        }
    </style>
</head>
<body>
    {{-- Konten halaman (login/register) --}}
    <main>
        @yield('content')
    </main>
</body>
</html>