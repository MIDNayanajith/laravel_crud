@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="col-md-6 offset-3">
            <h3 class="text-white">Login</h3>
            @if(session('success'))
            <div class="alert alert-success">{{ session('sucess') }}</div>
            @endif

            <div class="card bg-dark text-white mt-3">
                <div class="card-body">
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"
                            class="form-control bg-dark text-white @error('email')is-inavalid @enderror"
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
                            class="form-control bg-dark text-white @error('password')is-inavalid @enderror"
                            value="{{ old('password') }}"
                            >
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                        <button type="submit"class="btn btn-success">Login</button>
                        <a href="{{ route('register') }}" class="btn btn-link text-info">Register</a>

                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
