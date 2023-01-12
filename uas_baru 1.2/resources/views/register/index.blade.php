@extends('layouts.main')
@section('judul_halaman', 'register')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Login Form</h2>

                <div class="card my-5">

                    <form class="card-body cardbody-color p-lg-5" action="/register" method="POST">
                        @csrf

                        <div class="text-center">
                            <img src="{{ asset('img/logounsika.png') }}" class="img-fluid  my-3" width="200px"
                                alt="profile">
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Username"
                                value="{{ old('name') }}">
                            <label for="name">Name</label>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Name"
                                value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                value="{{ old('email') }}">
                            <label for="email">Email</label>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="password" value="{{ old('password') }}">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center"><button type="submit"
                                class="btn btn-color px-5 mb-5 w-100">Register</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
