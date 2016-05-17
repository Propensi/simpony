 
<div class="modal fade" id="modalcreate" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1>Membuat Jadwal Tayang Program</h1>
        </div>
        <div class="modal-body">

    {!! Form::open(['url' => '/jadwaltayangs2', 'class' => 'form-horizontal']) !!}

                {!! Form::hidden('Prog_ID', $program->Prog_ID) !!}
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
