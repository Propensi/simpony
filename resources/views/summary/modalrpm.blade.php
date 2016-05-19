 
<div class="modal fade" id="modalrpm" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1>Membuat Rating Per Menit</h1>
        </div>
        <div class="modal-body">

    {!! Form::open(['url' => '/rpm', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('Sum_ID',$summary->Sum_ID) !!}
                <div class="form-group {{ $errors->has('Artis_ID') ? 'has-error' : ''}}">
                {!! Form::label('Nama Artis', 'Nama Artis', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('Artis_ID', (['' => 'Pilih Artis'] + $artis), null,['class' => 'form-control' , 'required'=> 'required']) !!}
                    {!! $errors->first('Artis_ID', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Rating') ? 'has-error' : ''}}">
                {!! Form::label('Rating', trans('Rating'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('Rating', null, ['class' => 'form-control', 'required' => 'required', 'min'=>'0' , 'max' => '100']) !!}
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
