@extends('layouts.main')
@section('judul_halaman', 'Login')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h2 class="text-center text-dark mt-5">Login Form</h2>

                <div class="card my-5">

                    <form class="card-body cardbody-color p-lg-5" action="/login" method="POST">
                        @csrf
                       <div class="text-center">
                            <img src="{{ asset('img/logounsika.png') }}"
                                class="img-fluid  my-3" width="200px"
                                alt="profile">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" placeholder="name@example.domain" autofocus value="{{ old('email') }}">
                            <label for="email">Email</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="password">
                            <label for="password">Password</label>

                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Login</button>
                        </div>
                        <div class="form-text text-center mb-5 text-dark">Not
                            Registered? <a href="/register" class="text-dark fw-bold"> Create an
                                Account</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
