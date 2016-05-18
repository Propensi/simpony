@extends('layouts.admin_template')

@section('content')
    <h1>Pembuatan Data Riset</h1>
    <hr/>
    {!! Form::open(['url' => 'assignments2', 'class' => 'form-horizontal', 'files' => true]) !!}

            <div class="form-group {{ $errors->has('Prog_ID') ? 'has-error' : ''}}">
                {!! Form::label('Prog_ID', 'Nama Program :', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">

                    {!! Form::select('Prog_ID', $programs, null, ['class' => 'form-control', 'required'=> 'required']) !!}

                    {!! $errors->first('Prog_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

             <div class="form-group {{ $errors->has('Tgl_Deadline') ? 'has-error' : ''}}">
                {!! Form::label('Tanggal', 'Tanggal Summary: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('Tanggal', null, ['class' => 'form-control', 'required'=> 'required']) !!}

                    
                    {!! $errors->first('Tanggal', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('Assn_Deskripsi') ? 'has-error' : ''}}">
                {!! Form::label('Deskripsi', 'Deskripsi: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('Deskripsi', null, ['class' => 'form-control', 'required'=> 'required']) !!}
                    {!! $errors->first('Deskripsi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

           
          
            {!! Form::hidden('Staff', '27' ) !!}
            {!! Form::hidden('Dept_ID','6') !!}
            {!! Form::hidden('Sender', Auth::user()->user_ID ) !!}
            
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

@endsection