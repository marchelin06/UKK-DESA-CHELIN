<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pilih Login</title>
    <style>
        body { 
            font-family: Arial; 
            background: #f5f5f5; 
            display:flex; 
            justify-content:center; 
            align-items:center; 
            height:100vh; 
        }
        .box { 
            background:#fff; 
            padding:30px; 
            border-radius:10px; 
            width:350px; 
            text-align:center; 
            box-shadow:0 0 10px rgba(0,0,0,0.1); 
        }
        a { 
            display:block; 
            margin:10px 0; 
            padding:12px; 
            background:#4CAF50; 
            color:#fff; 
            border-radius:6px; 
            text-decoration:none; 
        }
        a:hover { background:#45a049; }
        .btn-admin { background:#1976d2; }
        .btn-admin:hover { background:#1258a6; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Pilih Login</h2>

        {{-- Login user --}}
        <a href="{{ route('login') }}">Login User</a>

        {{-- Login admin (dicek apakah route ada) --}}
        @if (Route::has('admin.login'))
            <a href="{{ route('admin.login') }}" class="btn-admin">Login Admin</a>
        @else
            <a href="#" class="btn-admin" onclick="alert('Route admin.login belum dibuat!')">Login Admin</a>
        @endif

    </div>
</body>
</html>