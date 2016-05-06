@extends('layouts.admin_template')

@section('content')

    <h1>Create New Artist</h1>
    <hr/>

    {!! Form::open(['url' => 'artists', 'class' => 'form-horizontal']) !!}

                <!-- <div class="form-group {{ $errors->has('Artis_ID') ? 'has-error' : ''}}">
                {!! Form::label('Artis_ID', 'Artis Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Artis_ID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Artis_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->
            <div class="form-group {{ $errors->has('Nama_Artis') ? 'has-error' : ''}}">
                {!! Form::label('Nama_Artis', 'Nama Artis: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Nama_Artis', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Nama_Artis', '<p class="help-block">:message</p>') !!}
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

@endsection