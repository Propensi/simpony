@extends('layouts.master')

@section('content')

    <h1>Summary</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Summary ID</th><th>Nama Program</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $summary->Sum_ID }}</td> <td> {{ $summary->Prog_Nama }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection