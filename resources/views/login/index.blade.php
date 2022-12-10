@extends('layouts.form')

@section('content')
@section ('title') {{ 'Login' }} @endsection
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
        <div class="card-body">
            <!-- Logo -->
            
            
            <h1 class="mb-2 text-center demo text-body fw-bolder">Masuk</h1>
            <!-- /Logo -->
            {{-- <h4 class="mb-2 text-center">Selamat Datang 👋</h4> --}}
            <p class="mb-4 text-center">Login ini hanya untuk admin!</p>

            <form id="formAuthentication" class="mb-3" action="/login/login" method="POST">
                @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" value="{{ Session::get('email') }}" name="email" autofocus/>
            </div>
            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                {{-- <a href="auth-forgot-password-basic.html">
                    <small>Forgot Password?</small>
                </a> --}}
                </div>
                <div class="input-group input-group-merge">
                <input type="password" class="form-control" value="{{ Session::get('password') }}" name="password" aria-describedby="password"/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
            </div>
            {{-- <div class="mb-3">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
                </div>
            </div> --}}
            <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" name="submit" type="submit">Masuk</button>
            </div>
            </form>

            <p class="text-center">
            <span>Belum punya akun?</span>
            <a href="/login/register">
                <span>Daftar akun</span>
            </a>
            </p>
        </div>
        </div>
        <!-- /Register -->
    </div>
    </div>
</div>

@endsection