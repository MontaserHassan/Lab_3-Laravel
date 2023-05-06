{{-- @include('notification'); --}}


@extends('layouts.app')

@section('content')

    <div class="container text-center m-auto mt-3">
        <a class="btn w-25 btn-primary fw-bold" href="{{ route('student.create') }}">Add Student</a>
    </div>

    @if (session('success'))
        <div id="success-message" class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-5 table-striped table-hover border border-secondary">

        <thead class='bg-dark text-light'>

            <tr class="text-center fw-bold">
                <th>#</th>
                <th>IDno</th>
                <th>Name</th>
                <th>Age</th>
                <th>UPDATE</th>
                <th>DELETE</th>
            </tr>

        </thead>

        <tbody class="table-group-divider">
            @foreach ( $students as $student )

                <tr class="text-center fw-semibold">
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $student->IDno }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td><a class="btn btn-warning fw-semibold" onclick="return confirm('Are you sure you want to edit this student?')" href="{{ route('student.edit', $student->id) }}">UPDATE</a></td>
                    <td>
                        <form action="{{ route('student.delete', $student->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">DELETE</button>
                        </form>
                    </td>
                </tr>

            @endforeach

        </tbody>

    </table>

@endsection
