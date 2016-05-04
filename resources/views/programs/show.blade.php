@extends('layouts.master')

@section('content')

    <h1>Program</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Prog ID</th><th>Nama Program</th><th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $program->Prog_ID }} </td><td> {{ $program->Prog_Nama }} </td><td> {{ $program->Prog_Deskripsi }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection