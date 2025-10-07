<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body style="font-family: sans-serif;">
    <h1>Selamat Datang, {{ $user->name }} (Admin)</h1>
    <p>Ini adalah dashboard untuk admin.</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>