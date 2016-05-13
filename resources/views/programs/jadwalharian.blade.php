@extends('layouts.admin_template')

@section('content')
<div class="container">

    <h1>Jadwal Program Tayang Hari Ini</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama Program</th><th>Jam Tayang</th><th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($jadwaltayangs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->Nama_Program }}</td>
                    <td>{{ $item->Time }}</td>
                    <td>{{ $item->Tanggal }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $jadwaltayangs->render() !!} </div>
    </div>
</div>
@endsection
