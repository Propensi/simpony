@extends('layouts.admin_template')

@section('content')

    <h1>Program</h1>
    <div class="invoice">
            <h2>{{ $program->Prog_Nama }}</h2>
            <hr>
        
            <h3>Deskripsi : {{ $program->Prog_Deskripsi }}</h3>
    </div>


    <h1>Mengelola Artis<button type="button" class="btn btn-info btn-md pull-right" data-toggle="modal" data-target="#myModal">Mendaftarkan Nama Artis</button></h1>
    <div class="invoice">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                   <th>Nama Artis</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($artists as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!-- <td>{{ $x }}</td> -->
                    <td><a href="{{ url('artists', $item->Artis_ID) }}">{{ $item->Nama_Artis }}</a></td>
                    <td>
                        <a href="{{ url('artists/' . $item->Artis_ID . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['artists', $item->Artis_ID],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
       
    </div>

 <!-- Modal -->

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1>Mendaftarkan Artis</h1>
        </div>
        <div class="modal-body">
           

   {!! Form::open(['url' => 'artists/save', 'class' => 'form-horizontal']) !!}

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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

@endsection