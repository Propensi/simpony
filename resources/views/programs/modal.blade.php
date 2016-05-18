<!-- Modal -->

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1>Mendaftarkan Artis</h1>
        </div>
        <div class="modal-body">
           
    {!! Form::open(['url' => 'artprogs/store', 'class' => 'form-horizontal']) !!}

               
            <div class="form-group {{ $errors->has('Nama_Artis') ? 'has-error' : ''}}">
                 {!! Form::label('Nama_Artis', 'Nama Artis: ', ['class' => 'col-sm-3 control-label']) !!}

                <div class="col-sm-6">
                    {!! Form::select('Artis_ID', (['' => 'Pilih Artis'] + $artis), null,['class' => 'form-control' , 'required'=> 'required']) !!}
                    
                    {!! $errors->first('Nama_Artis', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
                
                    {!! Form::hidden('Prog_ID',$program->Prog_ID) !!}

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

<hr>

<button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#demo">Menambahkan Artis Baru</button>   

    <div id="demo" class="collapse">
   {!! Form::open(['url' => 'artists/save', 'class' => 'form-horizontal']) !!}

             <h3>Menambahkan Artis</h3>   
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
    </div>

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

  @if ($errors->any())
   <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif
