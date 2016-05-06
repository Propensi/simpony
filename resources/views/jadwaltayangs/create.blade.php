@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Jadwaltayang</h1>
    <hr/>

    {!! Form::open(['url' => '/jadwaltayangs', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('Prog_ID') ? 'has-error' : ''}}">
                {!! Form::label('Prog_ID', trans('jadwaltayangs.Prog_ID'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Prog_ID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Prog_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Nama_Program') ? 'has-error' : ''}}">
                {!! Form::label('Nama_Program', trans('jadwaltayangs.Nama_Program'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Nama_Program', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Nama_Program', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Tanggal') ? 'has-error' : ''}}">
                {!! Form::label('Tanggal', trans('jadwaltayangs.Tanggal'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('Tanggal', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Tanggal', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Time') ? 'has-error' : ''}}">
                {!! Form::label('Time', trans('jadwaltayangs.Time'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('time', 'Time', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Time', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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

</div>
@endsection