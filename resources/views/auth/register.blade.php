@extends('layouts.auth')

@section('content')

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

@endsection