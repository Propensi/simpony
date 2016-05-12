@extends('layouts.admin_template')

@section('content')

    <h1>Mengubah Summary</h1>
    <hr/>

    {!! Form::model($summary, [
        'method' => 'PATCH',
        'url' => ['summary', $summary->Sum_ID],
        'class' => 'form-horizontal',
        'class' => 'form-horizontal update'
    ]) !!}
<!-- 
                <div class="form-group {{ $errors->has('Sum_ID') ? 'has-error' : ''}}">
                {!! Form::label('Sum_ID', 'Sum Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Sum_ID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Sum_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->
<!--             <div class="form-group {{ $errors->has('Prog_ID') ? 'has-error' : ''}}">
                {!! Form::label('Prog_ID', 'Prog Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Prog_ID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Prog_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div> -->
            <div class="form-group {{ $errors->has('Prog_Nama') ? 'has-error' : ''}}">
                {!! Form::label('Prog_Nama', 'Nama Program: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Prog_Nama', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Prog_Nama', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Average_Rating') ? 'has-error' : ''}}">
                {!! Form::label('Average_Rating', 'Average Rating: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Average_Rating', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Average_Rating', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Tanggal_Sum') ? 'has-error' : ''}}">
                {!! Form::label('Tanggal_Sum', 'Tanggal Summary: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'Tanggal_Sum', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Tanggal_Sum', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Ubah', ['class' => 'btn btn-primary form-control']) !!}
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
<script>
    $(".update").on("submit", function(){
        return confirm("Apakah Anda Yakin Untuk Mengubah Data Ini?");
    });
</script>
@endsection