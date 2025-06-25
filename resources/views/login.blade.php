@extends('app')

@section('head')
    <link rel="stylesheet" href="../css/login_register.css">
@endsection

@section('content')
  <div class="button_box">
      <a href="{{ route('register') }}"><button>Register</button></a>
  </div>
  <div class="overlay">
      <div class="container">
        <h1 class="title"><span>Login</span></h1>
        <form class="login-form" method="post" action="{{ route('login') }}">
          @csrf
          <input type="email" name="email" placeholder="Email address" required>
          <input type="password" name="password" placeholder="Password" required>
          {{-- <label class="remember">
            <input type="checkbox"> Remember me
          </label> --}}
          <button type="submit">Login</button>
          {{-- <a href="#" class="forgot-password">Forgot password?</a> --}}
          {{-- {{ session('success') }} --}}
          <div class="error">{{ session('error') }}</div>
        </form>
      </div>
    </div>
@endsection