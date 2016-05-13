@extends('layouts.admin_template')

@section('content')

    <h1>Program Acara</h1>
    <div class="row">
        <div class="col-md-12">
    <div class="invoice" style="margin: 0px 0px;">
            <h2>{{ $program->Prog_Nama }}</h2>
            <hr>
        
            <h5>Deskripsi : {{ $program->Prog_Deskripsi }}</h5>
    </div>
    </div>
    </div>



    <br>

    <div class="row">
    <div class="col-md-6">
        <div class="box">
               
    <div class="box-header with-border">
            <h3 class="box-title">Mengelola Artis</h3>


            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
    </div>
    <div class="box-body">
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
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['artprogs', $item->artprog_ID],
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

      <div class="box-footer">
        <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal">Mendaftarkan Nama Artis</button>
    </div>

    </div>
    </div>


<!-- tutup box -->
   

    <div class="col-md-6">
        <div class="box">
             <div class="box-header with-border">
            <h3 class="box-title">Mengelola Summary Rating</h3>


            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
    </div>

    <div class="box-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th><th>Tanggal</th><th>Avg. Rating</th><th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($summary as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('summary/rpm', $item->Sum_ID) }}">{{ $item->Tanggal_Sum }}</a></td>
                    <td></td>
                    <td>
                        <a href="{{ url('summary/' . $item->Sum_ID . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Ubah</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['summary', $item->Sum_ID],
                            'style' => 'display:inline',
                            'class' => 'delete'
                        ]) !!}
                            {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
                          <?php 
                    if($x == '0'){
                        echo 
                        '<td>Tidak ada summary program yang tersedia.</td><td></td><td></td>
                        ';
                    }
                    ?>
            </tbody>
        </table>
        
    
    </div>

    <div class="box-footer">
        <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#modalsum">Menambahkan Summary</button>
    </div>


     </div> 
    <script>
    $(".delete").on("submit", function(){
        return confirm("Apakah Anda Yakin Untuk Menghapus Data Ini?");
    });
</script>
    @include('programs.modal')
     @include('programs.modalsum')
 


@endsection