@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h3 class="text-white">Edit Student</h3>
                <a href="{{ route('students.index') }}" class="btn btn-outline-warning mt-2">Back</a>

                <div class="card bg-dark text-white mt-4">
                    <div class="card-body border border-light rounded">
                        <form action="{{ route('student.update',$student->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text"  name="name" class="form-control bg-dark text-white @error('name') is-invalid @enderror" value="{{ old('name',$student->name) }}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control bg-dark text-white @error('email') is-invalid @enderror" value="{{ old('email',$student->email) }}">
                                  @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">phone</label>
                                <input type="text" name="phone" class="form-control bg-dark text-white  @error('phone') is-invalid @enderror" value="{{ old('phone',$student->phone) }}">
                                  @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button
                            type="submit" class="btn btn-outline-success text-white"
                            >Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
