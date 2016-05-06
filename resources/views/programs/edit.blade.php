@extends('layouts.admin_template')

@section('content')

    <h1>Edit Program</h1>
    <hr/>

    {!! Form::model($program, [
        'method' => 'PATCH',
        'url' => ['programs', $program->Prog_ID],
        'class' => 'form-horizontal',
        'class' => 'form-horizontal update'
    ]) !!}
            <div class="form-group {{ $errors->has('Prog_Nama') ? 'has-error' : ''}}">
                {!! Form::label('Prog_Nama', 'Nama Program: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Prog_Nama', null, ['class' => 'form-control','unique' => 'Prog_Nama','required'=>'required']) !!}
                    {!! $errors->first('Prog_Nama', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Prog_Deskripsi') ? 'has-error' : ''}}">
                {!! Form::label('Prog_Deskripsi', 'Deskripsi: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('Prog_Deskripsi', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Prog_Deskripsi', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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
        return confirm("Do you want to update this item?");
    });
</script>
@endsection

