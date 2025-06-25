@extends('app')

@section('head')
    <link rel="stylesheet" href="../css/login_register.css">
@endsection

@section('content')
    <div class="button_box">
        <a href="{{ route('login') }}"><button>Login</button></a>
    </div>
    <div class="overlay">
        <div class="container">
            <h1 class="title"><span>Register</span></h1>
            <form class="login-form" method="post" action="{{ route('register') }}"">
                @csrf
                <input type="email" name="email" placeholder="Email address" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_confirmation" placeholder="password_confirmation" required>
                <button type="submit">Register</button>
                {{-- {{ session('success') }} --}}
                <div class="error">{{ session('error') }}</div>
            </form>
        </div>
    </div>
@endsection