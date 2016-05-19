@extends('layouts.admin_template')

@section('content')
@include('layouts.flash')

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
                    <th>Status Pekerjaan</th>            
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
                            echo 'Disetujui';
                        }
                    ?>
                </tr>
            </tbody>    
        </table>
    </div>

    {!! Form::model($assignment, [
        'method' => 'PATCH',
        'url' => ['assignments/update2', $assignment->Assn_ID],
        'class' => 'form-horizontal update'
    ]) !!}

            

            <div class="form-group {{ $errors->has('HG_ID') ? 'has-error' : ''}}">
                {!! Form::label('HG_ID', 'Pilih Head Group: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('HG_ID', (['' => 'Pilih'] + $aser), null, ['class' => 'form-control' , 'required'=> 'required'] ) !!}
                    {!! $errors->first('HG_ID', '<p class="help-block">:message</p>') !!}

                </div>
            </div>



    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Assign', ['class' => 'btn btn-primary form-control']) !!}
            
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
        return confirm("Apakah Anda Yakin Untuk Mengassign Pekerjaan Ini?");
    });
</script>
@endsection