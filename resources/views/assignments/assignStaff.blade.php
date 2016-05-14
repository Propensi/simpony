@extends('layouts.admin_template')

@section('content')

<head>
<script src"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/7.0.2/bootstrap-slider.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/7.0.2/bootstrap-slider.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/7.0.2/css/bootstrap-slider.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/7.0.2/css/bootstrap-slider.min.css" rel="stylesheet">

</head>

<span id="ex18-label-1" class="hidden">Example slider label</span>
        <input id="ex19" type="text"
              data-provide="slider"
              data-slider-ticks="[1, 2, 3]"
              data-slider-ticks-labels='["short", "medium", "long"]'
              data-slider-min="1"
              data-slider-max="3"
              data-slider-step="1"
              data-slider-value="3"
              data-slider-tooltip="show" />

    <h1>Assign Pekerjaan</h1>
    <hr>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Pengirim</th>
                    <th>Departemen</th>
                    <!--<th>Head Group</th>-->
                    <th>Tgl. Dibuat</th>
                    <th>Tgl. Deadline</th>
                    <th>Status</th>            
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $assignment->Assn_ID }}</td> 
                    <td> {{ $assignment->Assn_Nama }} </td>
                    <td> {{ $assignment->Assn_Deskripsi}} </td>
                    <td> {{ $assignment->Assn_File }}</td>
                    <td> {{ $assignment->Emp_ID_Req_Vald }}</td>
                    <td> {{ $assignment->Dept_ID }}</td>
                    <!--<td> {{ $assignment->Staff_Prog_ID_Do }}</td>-->
                    <td> {{ $assignment->Tgl_Request }}</td>
                    <td> {{ $assignment->Tgl_Deadline }} </td>
                    <td>
                    <?php  
                        if (($assignment -> Assn_Status) == '1'){
                            echo 'Approved';
                        }
                    ?>
                </tr>
            </tbody>    
        </table>
    </div>



    {!! Form::model($assignment, [
        'method' => 'PATCH',
        'url' => ['assignments', $assignment->Assn_ID],
        'class' => 'form-horizontal'
    ]) !!}



            <div class="form-group {{ $errors->has('mgr_id') ? 'has-error' : ''}}">
                {!! Form::label('Staff_Prog_ID_Do', 'Pilih Staff: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('Staff_Prog_ID_Do', (['' => 'Select a Staff'] + $eser), null, ['class' => 'form-control' , 'required'=> 'required']) !!}
                    {!! $errors->first('Staff_Prog_ID_Do', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Assign Staff', ['class' => 'btn btn-primary form-control']) !!}
            
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



    <hr>

      <!-- Modal -->

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1>Create New Step</h1>
        </div>
        <div class="modal-body">
           

    {!! Form::open(['url' => 'steps', 'class' => 'form-horizontal']) !!}

              {!! Form::hidden('Assn_ID',$assignment->Assn_ID) !!}

            <div class="form-group {{ $errors->has('Title') ? 'has-error' : ''}}">
                {!! Form::label('Title', 'Step: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Step') ? 'has-error' : ''}}">
                {!! Form::label('Step', 'Deskripsi: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Step', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Step', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

                <div class="form-group {{ $errors->has('Step') ? 'has-error' : ''}}">
                {!! Form::label('bobot', 'Bobot: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    
                    <input type="number" class ="form-control" name="bobot" min={{$min}} max="100"> 
                    <?php if(!is_null($min)) {

                           echo '<p>minimal : '.$min.'</p>';
                       }
                    ?>
                    {!! $errors->first('Step', '<p class="help-block">:message</p>') !!}
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
    <h1>Steps <button type="button" class="btn btn-info btn-md pull-right" data-toggle="modal" data-target="#myModal">Membuat Step Baru</button></h1>

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                   <th>ID Step</th><th>Judul</th><th>Deskripsi</th>
                </tr>
            </thead>
            <tbody> 
            {{-- */$x=0;/* --}}
            @foreach($steps as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!--<td>{{ $x }}</td>-->
                    <td>{{ $x }}</td><td><a href="{{ url('steps', $item->ID_Step) }}">{{ $item->Title }}</a></td><td>{{ $item->Step }}</td>
                    <td>
                        <a href="{{ url('steps/' . $item->ID_Step . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['steps', $item->ID_Step],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


       <button type="button" class="btn btn-default" data-dismiss="modal"><a href="http://localhost/TestRepo3/simpony2/public/assignments/hgstaff">Kembali</a></button>

       
    </div>



@endsection