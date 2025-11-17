@extends('layouts.auth')

@section('content')

    <div class="container">
        <h2>Login</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
    @csrf
<div>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
</div>
   <div>
     <input type="password" name="password" placeholder="Password" required>
   </div>

    <button type="submit">Login</button>
</form>

        <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
    </div>

@endsection