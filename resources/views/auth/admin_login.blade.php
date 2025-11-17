<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            width: 420px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .btn-primary {
            background-color: #0d6efd;
            border: none;
            padding: 10px;
            border-radius: 6px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        h2 {
            font-weight: 700;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h2 class="text-center mb-4">Login Admin</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('login.admin.post') }}" method="POST">
        @csrf

        <label class="mb-1">Email</label>
        <input type="email" name="email" class="form-control mb-3" required>

        <label class="mb-1">Password</label>
        <input type="password" name="password" class="form-control mb-4" required>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>

</body>
</html>