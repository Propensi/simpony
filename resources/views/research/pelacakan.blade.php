@extends('layouts.admin_template')

@section('content')
<h1>Melihat Pekerjaan</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th><th>Nama Program</th><th>Tanggal</th><th>Pengirim</th><th>Status</th><th>Deskripsi</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($assignments2 as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('assignments2', $item->Assn_ID) }}">{{ $item->program->Prog_Nama }}</a></td>
                    <td>{{ $item->Tanggal }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->Status }}</td>
                    <td>{{ $item->Deskripsi }}</td>
                    <td>

                            {!! Form::model($assignments2, [
                                              'method' => 'PATCH',
                                              'url' => ['assignments2/update', $item->Assn_ID],
                                              'style'=>'display:inline-block' ]) !!}
                                              
                                               {!! Form::hidden('Status', 'Proses' ) !!}

                                     {!! Form::submit('Terima', ['class' => 'btn btn-primary btn-xs '])  !!}
                                      
                                      {!! Form::close() !!}
                         /
                                    {!! Form::model($assignments2, [
                                              'method' => 'PATCH',
                                              'url' => ['assignments2/update', $item->Assn_ID],
                                              'style'=>'display:inline-block' ]) !!}
                                              
                                               {!! Form::hidden('Status', 'Ditolak' ) !!}

                                     {!! Form::submit('Tolak', ['class' => 'btn btn-danger btn-xs'])  !!}
                                      
                                      {!! Form::close() !!}   

                                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $assignments2->render() !!} </div>
    </div>
@endsection