@extends('layouts.master')

@section('content')

    <h1>Program</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Prog ID</th><th>Prog Nama</th><th>Jadwal Tayang</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $program->id }}</td> <td> {{ $program->Prog_ID }} </td><td> {{ $program->Prog_Nama }} </td><td> {{ $program->Jadwal_Tayang }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection