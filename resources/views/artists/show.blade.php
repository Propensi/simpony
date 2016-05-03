@extends('layouts.master')

@section('content')

    <h1>Artist</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Artis ID</th><th>Nama Artis</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $artist->Artis_ID }} </td><td> {{ $artist->Nama_Artis }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection