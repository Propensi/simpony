@extends('layouts.admin_template')

@section('content')
<div class="col-md-10">

    <h1>Jadwal tayang</h1>

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th>S.No</th> -->
                    <th>Jam</th><th>Program</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($jadwaltayangs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!-- <td><a href="{{ url('jadwaltayangs', $item->Jadwal_ID) }}">{{ $x }}</td> -->
                    <td>{{ $item->Time }}</a></td>
                    <td>{{ $item->Nama_Program }}</td>
                   
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $jadwaltayangs->render() !!} </div>
    </div>

</div>

@endsection