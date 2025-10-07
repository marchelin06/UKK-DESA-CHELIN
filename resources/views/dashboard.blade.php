<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 50px; background: #f5f5f5; }
        .card { background: #fff; padding: 30px; border-radius: 10px; max-width: 500px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        button { padding: 10px 20px; background: #f44336; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #d32f2f; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Selamat datang, {{ auth()->user()->name }}</h2>
        <p>Role: {{ auth()->user()->role }}</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>