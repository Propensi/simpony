@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Jadwaltayang</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('jadwaltayangs.Prog_ID') }}</th><th>{{ trans('jadwaltayangs.Nama_Program') }}</th><th>{{ trans('jadwaltayangs.Tanggal') }}</th><th>{{ trans('jadwaltayangs.Time') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $jadwaltayang->Jadwal_ID }}</td> <td> {{ $jadwaltayang->Prog_ID }} </td><td> {{ $jadwaltayang->Nama_Program }} </td><td> {{ $jadwaltayang->Tanggal }} </td><td> {{ $jadwaltayang->Time }} </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection