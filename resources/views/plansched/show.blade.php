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

    <div class="col-md-10">

    <h1>Jadwal Tayang <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#modalcreate">Membuat Jadwal Tayang</button></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th>S.No</th> -->
                    <th>No.</th><th>{{ trans('jadwaltayangs.Tanggal') }}</th><th>{{ trans('jadwaltayangs.Time') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($jadwaltayangs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!-- <td><a href="{{ url('jadwaltayangs', $item->Jadwal_ID) }}">{{ $x }}</td> -->
                    <td>{{ $x }}</a></td>
                    <td>{{ $item->Tanggal }}</td>
                    <td>{{ $item->Time }}</td>
                    <td>
                        <a href="{{ url('/jadwaltayangs/' . $item->Jadwal_ID . '/edit') }}" class="btn btn-primary btn-xs">Ubah</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/jadwaltayangs', $item->Jadwal_ID],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $jadwaltayangs->render() !!} </div>
    </div>

</div></div>

@include('plansched.modalcreate')

@endsection