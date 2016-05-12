 
<div class="modal fade" id="modalsum" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1>Membuat Summary</h1>
        </div>
        <div class="modal-body">

    {!! Form::open(['url' => 'summary', 'class' => 'form-horizontal']) !!}
            
            {!! Form::hidden('Prog_ID',$program->Prog_ID) !!}
            <!-- tanggal tayang ID -->
            <div class="form-group {{ $errors->has('Tanggal_Sum') ? 'has-error' : ''}}">
                {!! Form::label('Tanggal_Sum', 'Tanggal Sum: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('Tanggal_Sum', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Tanggal_Sum', '<p class="help-block">:message</p>') !!}
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
