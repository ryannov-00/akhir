@extends('layouts.form')

@section('content')
@section ('title') {{ 'Register' }} @endsection
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
     <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
        <div class="card-body">
            <!-- Logo -->
            
            
            <h1 class="mb-2 text-center demo text-body fw-bolder">Register</h1>
            
            <p class="mb-4 text-center">Buat akunmu sekarang!</p>

            <form id="formAuthentication" class="mb-3" action="/login/create" method="POST">
                @csrf
            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Session::get('name') }}"/>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control"  name="email" value="{{ Session::get('email') }}" />
            </div>
            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                <input type="password" class="form-control" name="password" value="{{ Session::get('password') }}"/>
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
            </div>

            {{-- <div class="mb-3">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                <label class="form-check-label" for="terms-conditions">
                    I agree to
                    <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
                </div>
            </div> --}}
            <button class="btn btn-primary d-grid w-100">Register</button>
            </form>

            <p class="text-center">
            <span>Sudah punya akun?</span>
            <a href="/login">
                <span>Masuk</span>
            </a>
            </p>
        </div>
        </div>
        <!-- Register Card -->
    </div>
    </div>
</div>
    
@endsection