<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Warga</title>
</head>
<body style="font-family: sans-serif;">
    <h1>Halo, {{ $user->name }} (Warga)</h1>
    <p>Selamat datang di Sistem Informasi Desa.</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>