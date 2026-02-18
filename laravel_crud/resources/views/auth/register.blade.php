@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="col-md-6 offset-3">
        <h3 class="text-white">Register</h3>
        <div class="card bg-dark text-white mt-3">
            <div class="card-body">

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name"
                        class="form-control bg-dark text-white @error('name')is-invalid @enderror"
                        value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3" >
                        <label class="form-label">Email</label>
                        <input type="email" name="email"
                        class="form-control bg-dark text-white @error('email')is-invalid @enderror"
                        value="{{ old('email') }}"
                        >
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password"
                        class="form-control bg-dark text-white @error('password')is-invalid
                        @enderror"
                        >
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password confirmation</label>
                        <input type="password" name="password_confirmation"class="form-control bg-dark text-white">
                    </div>
                    <button class="btn btn-success mt-3">
                        Register
                    </button>
                    <a href="{{ route('login') }}" class="btn btn-link text-info mt-3">Login</a>

                </form>
            </div>

        </div>

    </div>

</div>

@endsection
