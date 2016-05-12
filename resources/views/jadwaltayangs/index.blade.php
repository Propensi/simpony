@extends('layouts.admin_template')

@section('content')
<div class="col-md-10">

    <h1>Jadwal Tayang <a href="{{ url('/jadwaltayangs/create') }}" class="btn btn-primary pull-right btn-sm">Tambah Jadwal Tayang Baru</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th>S.No</th> -->
                    <th>{{ trans('jadwaltayangs.Prog_ID') }}</th><th>{{ trans('jadwaltayangs.Nama_Program') }}</th><th>{{ trans('jadwaltayangs.Tanggal') }}</th><th>{{ trans('jadwaltayangs.Time') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($jadwaltayangs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!-- <td><a href="{{ url('jadwaltayangs', $item->Jadwal_ID) }}">{{ $x }}</td> -->
                    <td>{{ $item->Prog_ID }}</a></td>
                    <td>{{ $item->Nama_Program }}</td>
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

</div>
@endsection
