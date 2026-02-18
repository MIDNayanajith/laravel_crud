@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <h3 class="text-white mb-4">Student List</h3>
        <a href="{{ route('students.create') }}" class="btn btn-outline-info mb-3">Add Student</a>

        @session('sucess')
        <div class="alert alert-sucess alert-dismissible fade show" role="alert">
            <strong>Success!</strong>{{ $value }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
        @endsession


    <table class="table table-bordered table-dark table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>
                    <a href="{{ route('student.show',$student->id) }}" class="btn btn-outline-warning">View</a>
                    <a href="{{ route('student.edit',$student->id) }}" class="btn btn-outline-info">Edit</a>
                    <form action="{{ route('student.destroy',$student->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <buutn
                        type="submit"
                        class="btn btn-outline-danger"
                        onClick="return confirm('Are you sure!')"
                        >
                        Delete
                        </buutn>

                    </form>
                </td>
            </tr>

            @empty
                <tr>
                   <td colspan="5" class="text-center">No Records Found</td>
                </tr>
          @endforelse
        </tbody>
    </table>
</div>
@endsection
