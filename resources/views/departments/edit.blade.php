@extends('layouts.admin_template')

@section('content')

    <h1>Edit Departemen</h1>
    <hr/>

    {!! Form::model($department, [
        'method' => 'PATCH',
        'url' => ['departments', $department->Dept_ID],
        'class' => 'form-horizontal',
        'class' => 'form-horizontal update'
    ]) !!}

                <div class="form-group {{ $errors->has('Dept_Name') ? 'has-error' : ''}}">
                {!! Form::label('Dept_Name', 'Nama Departemen: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Dept_Name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('Dept_Name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Perbaharui', ['class' => 'btn btn-primary form-control']) !!}
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