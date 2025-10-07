<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .container { background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 400px; }
        input { width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc; }
        button { width: 100%; padding: 10px; background: #4CAF50; color: #fff; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #45a049; }
        .error { color: red; margin-bottom: 10px; }
        a { text-decoration: none; color: #333; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required>
    <input type="text" name="username" placeholder="Username (opsional)" value="{{ old('username') }}">
    <input type="text" name="nik" placeholder="NIK (opsional)" value="{{ old('nik') }}">
    <input type="text" name="no_hp" placeholder="No HP (opsional)" value="{{ old('no_hp') }}">
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
    <button type="submit">Register</button>
</form>

        <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
    </div>
</body>
</html>