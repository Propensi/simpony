@extends('layouts.admin_template')

@section('content')

    <h1>Membuat Program Acara</h1>
    <hr/>

    {!! Form::open(['url' => 'programs', 'class' => 'form-horizontal']) !!}

<!--                  <div class="form-group {{ $errors->has('Prog_ID') ? 'has-error' : ''}}">
                {!! Form::label('Prog_ID', 'Prog Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Prog_ID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Prog_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div>  -->
            <div class="form-group {{ $errors->has('Prog_Nama') ? 'has-error' : ''}}">
                {!! Form::label('Prog_Nama', 'Nama Program: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Prog_Nama', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('Prog_Nama', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <!-- <div class="form-group {{ $errors->has('Jadwal_Tayang') ? 'has-error' : ''}}">
                <p>
                {!! Form::label('Jadwal_Tayang', 'Jadwal Tayang: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Jadwal_Tayang', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Jadwal_Tayang', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->
            <div class="form-group {{ $errors->has('Prog_Deskripsi') ? 'has-error' : ''}}">
                {!! Form::label('Prog_Deskripsi', 'Deskripsi: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('Prog_Deskripsi', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Prog_Deskripsi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Tambahkan', ['class' => 'btn btn-primary form-control']) !!}
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