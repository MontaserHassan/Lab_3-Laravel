@extends('layouts.app')

@section('content')

    <div class="container text-center m-auto mt-3">
        <a class="btn w-25 btn-primary fw-bold" href="{{ route('students.all') }}">BACK</a>
    </div>

    {!! Form::model($student, ['route' => ['student.update', $student], 'method' => 'put', 'class' => 'border border-secondary rounded-2 m-auto mt-5 w-75 bg-secondary']) !!}

        <div class="mb-3 m-4">
            <label for="IDno" class="form-label">IDno</label>
            {!! Form::text('IDno', null, ['class' => 'form-control']) !!}
            @if($errors->has('IDno'))
                <div class="alert alert-danger w-50 mt-1 fw-bolder">{{ $errors->first('IDno') }}</div>
            @endif
        </div>

        <div class="mb-3 m-4">
            <label for="studentName" class="form-label">Student Name</label>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            @if($errors->has('name'))
                <div class="alert alert-danger w-50 mt-1 fw-bolder">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="mb-3 m-4">
            <label for="studentAge" class="form-label">Student Age</label>
            {!! Form::number('age', null, ['class' => 'form-control']) !!}
            @if($errors->has('age'))
                <div class="alert alert-danger w-50 mt-1 fw-bolder">{{ $errors->first('age') }}</div>
            @endif
        </div>

        <div class="col-md-12 m-auto mb-3 text-center">
            {!! Form::submit('ADD Student', ['class' => 'btn btn-success w-25']) !!}
        </div>

    {!! Form::close() !!}


@endsection
