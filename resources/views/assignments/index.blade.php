@extends('layouts.admin_template')

@section('content')
@include('layouts.flash')

    <h1>Daftar Pekerjaan <a href="{{ url('assignments/create') }}" class="btn btn-primary pull-right btn-sm">Tambah Pekerjaan Baru</a></h1>
    <div class="table">

                                                            <!-- TABEL 1 -->
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <h4> Request Masuk </h4>
                <tr>
                    <th>No.</th><th>Judul</th><th>Deskripsi</th><th>Tgl. Deadline</th><th>Tgl. Dibuat</th><th> Tindakan </th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}

            <!-- klo ada dollar itu artinya dia minta variiable ke asssignmentcontroller -->
            @foreach($assignments0 as $item)
                {{-- */$x++;/* --}}

                    <?php 
                        $texts='';
                        if(strlen($item->Assn_Deskripsi) > 20) {
                            
                          $texts = substr($item->Assn_Deskripsi, 0, 20).'...';
                          
                        } else {
                            $texts = $item->Assn_Deskripsi;
                        }

                        $date = substr($item->created_at, 0,10);


                    ?>

                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('assignments', $item->Assn_ID) }}">{{ $item->Assn_Nama }}</a></td><td> {{ $texts}} </td><td> {{ $item->Tgl_Deadline }} </td><td> {{ $date }} </td>
                    <td>
                       
                        <!-- ini punya Terima-->
                      {!! Form::open([
                            'method'=>'PATCH',
                            'url' => ['assignments', $item->Assn_ID],
                            'style' => 'display:inline',
                            'class' => 'form-horizontal update'
                        ]) !!}
                            {!! Form::submit('Setujui', ['class' => 'btn btn-primary btn-xs'] ) !!}
                            {!! Form::hidden('Assn_Status','1') !!}
                        {!! Form::close() !!}

                        /
                 
                    <!-- ini punya reject -->
                    {!! Form::open([
                            'method'=>'PATCH',
                            'url' => ['assignments', $item->Assn_ID],
                            'style' => 'display:inline',
                            'class' => 'form-horizontal delete'
                        ]) !!}
                            {!! Form::submit('Tolak', ['class' => 'btn btn-danger btn-xs'] ) !!}
                            {!! Form::hidden('Assn_Status','2') !!}
                        {!! Form::close() !!}
                        </td> 
                </tr>
            @endforeach
              <?php 
                    if($x == '0'){
                        echo 
                        '<td>Tidak ada request masuk.</td><td></td><td></td><td></td><td></td><td></td>
                        ';
                    }
                    ?>
                </tbody>
        </table>
        <div class="pagination"> {!! $assignments0->render() !!} </div>
                                                    <!-- TABEL 2 -->

            <!--request diterima-->
            <hr>   
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <h4> Request Diterima </h4>
                    <tr>
                         <th>No.</th><th>Judul</th><th>Deskripsi</th><th>Tgl. Deadline</th><th>Tgl. Dibuat</th><th>Tindakan</th>
                     </tr>
                </thead>
                <tbody>
            {{-- */$x=0;/* --}}
             
            @foreach($assignments1 as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('assignments', $item->Assn_ID) }}">{{ $item->Assn_Nama }}</a></td><td> {{ $item->Assn_Deskripsi}} </td><td> {{ $item->Tgl_Deadline }} </td><td> {{ $item->created_at}} </td>
                

                <td>
                        <!-- nge link ke posts/ idnya berapa /edit-->
                        <a href="{{ url('assignments/' . $item->Assn_ID . '/assign') }}"><button type="submit" class="btn btn-primary btn-xs">Assign</button></a>
                    </td>
                
                </tr>

                @endforeach
                <?php 
                    if($x == '0'){
                        echo 
                        '<td>Tidak ada request diterima.</td><td></td><td></td><td></td><td></td>
                        ';
                    }
                    ?>
                <tbody>
            </table>
    <div class="pagination"> {!! $assignments1->render() !!}</div>
    
    </div>

    <script>
    $(".update").on("submit", function(){
        return confirm("Apakah Anda Yakin Untuk Menyetujui Pekerjaan Ini?");
    });

        $(".delete").on("submit", function(){
        return confirm("Apakah Anda Yakin Untuk Menolak Pekerjaan Ini?");
    });
</script>
    
@endsection
