@extends('layouts.admin_template')

@section('content')
    
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
                    <td> {{ $assignment->sender->name }}</td>
                    <td> {{ $assignment->dept->Dept_Name }}</td>
                    <!--<td> {{ $assignment->Staff_Prog_ID_Do }}</td>-->
                    <td> {{ $assignment->created_at }}</td>
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


    <hr>

      <!-- Modal -->

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1>Membuat Milestone</h1>
        </div>
        <div class="modal-body">
           

    {!! Form::open(['url' => 'steps', 'class' => 'form-horizontal']) !!}

              {!! Form::hidden('Assn_ID',$assignment->Assn_ID) !!}

            <div class="form-group {{ $errors->has('Title') ? 'has-error' : ''}}">
                {!! Form::label('Title', 'Nama Milestone: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Title', null, ['class' => 'form-control', 'required'=> 'required']) !!}
                    {!! $errors->first('Title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Step') ? 'has-error' : ''}}">
                {!! Form::label('Step', 'Deskripsi: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Step', null, ['class' => 'form-control', 'required'=> 'required']) !!}
                    {!! $errors->first('Step', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

                <div class="form-group {{ $errors->has('Step') ? 'has-error' : ''}}">
                {!! Form::label('bobot', 'Bobot: ', ['class' => 'col-sm-3 control-label', 'required'=> 'required']) !!}
                <div class="col-sm-6">
                    
                    <input type="number" class ="form-control " name="bobot" min={{$min}} max="100" required> 
                    <?php if(!is_null($min)) {

                           echo '<p>minimal : '.$min.'</p>';
                       }
                    ?>
                    {!! $errors->first('Step', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Tambahkan', ['class' => 'btn btn-primary form-control']) !!}
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
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
    <h1>Milestone <?php if($var == 0) 
            { echo "<button type='button' class='btn btn-info btn-md pull-right' data-toggle='modal' data-target='#myModal'>Membuat Milestone Baru</button>"; };
    ?></h1>

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

        <?php
         if($var == 1) 
            { echo "
                <button type='button' class='btn btn-info btn-sm pull-right' data-toggle='modal' data-target='#modalrpm'>Assign Staff</button>";
           }
        ?>
       
    </div>
 <script>
    // $(".update").on("submit", function(){
    //     return confirm("Apakah Anda Yakin Untuk Mengassign Pekerjaan Ini?");
    // });

    // window.onbeforeunload = function() {
                    
    //                var Ans = confirm("Are you sure you want change page!");
    //                if(Ans==true)
    //                    return true;
    //                else
    //                    return false;
    //            };
</script>

<div class="modal fade" id="modalrpm" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1>Assign Staff</h1>
        </div>
        <div class="modal-body">

   {!! Form::model($assignment, [
        'method' => 'PATCH',
        'url' => ['assignments', $assignment->Assn_ID],
        'class' => 'form-horizontal update' 
    ]) !!}



            <div class="form-group {{ $errors->has('mgr_id') ? 'has-error' : ''}}">
                {!! Form::label('Staff_Prog_ID_Do', 'Pilih Staff: ', ['class' => 'col-sm-3 control-label', ]) !!}
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

</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<script>

if ( {{$var}} == 0) {
window.onbeforeunload = function(){
  return 'Silahkan membuat bobot hingga 100';
};

}

</script>

@endsection