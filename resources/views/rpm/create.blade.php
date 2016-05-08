@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New rpm</h1>
    <hr/>

    {!! Form::open(['url' => '/rpm', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('Artis_ID') ? 'has-error' : ''}}">
                {!! Form::label('Artis_ID', trans('Artis_ID'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Artis_ID', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('Artis_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Rating') ? 'has-error' : ''}}">
                {!! Form::label('Rating', trans('Rating'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Rating', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('Rating', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Deskripsi') ? 'has-error' : ''}}">
                {!! Form::label('Deskripsi', trans('Deskripsi'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('Deskripsi', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Deskripsi', '<p class="help-block">:message</p>') !!}
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