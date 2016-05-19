@extends('layouts.admin_template')

@section('content')

    <h1>Buat Departemen Baru</h1>
    <hr/>

    {!! Form::open(['url' => 'departments', 'class' => 'form-horizontal']) !!}

            <div class="form-group {{ $errors->has('Dept_ID') ? 'has-error' : ''}}">
                {!! Form::label('Dept_ID', 'ID Departemen: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Dept_ID', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('ID Departemen', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('Dept_Name') ? 'has-error' : ''}}">
                {!! Form::label('Dept_Name', 'Nama Departemen: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Dept_Name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('Nama Departemen', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Buat Baru', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection