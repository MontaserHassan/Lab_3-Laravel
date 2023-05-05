@extends('layouts.app')

@section('content')
    {{-- @dd($student) --}}
    {!! Form::model($student, ['route' => ['student.update', $student], 'method' => 'put', 'class' => 'border border-secondary rounded-2 bg-light mt-5 w-75 ms-5']) !!}

    <div class="mb-3 m-4">
        <label for="IDno" class="form-label">IDno</label>
        {!! Form::text('IDno', null, ['class' => 'form-control']) !!}
    </div>

    <div class="mb-3 m-4">
        <label for="studentName" class="form-label">Student Name</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {{-- <input type="text" value="{{ $student->studentName }}"> --}}
    </div>

    <div class="mb-3 m-4">
        <label for="studentAge" class="form-label">Student Age</label>
        {!! Form::number('age', null, ['class' => 'form-control']) !!}
    </div>

    <div class="col-md-12 m-auto mb-3 text-center">
        {!! Form::submit('ADD Student', ['class' => 'btn btn-success w-25']) !!}
    </div>

    {!! Form::close() !!}


@endsection
