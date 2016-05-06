@extends('layouts.admin_template')

@section('content')

<div class="table">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <h4> Jadwal Program </h4>
                    <tr>
                         <th>No.</th><th>Jam Tayang</th><th>Program</th>
                     </tr>
                </thead>
                <tbody>
            {{-- */$x=0;/* --}}
            @foreach($programs1 as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('programs', $item->Prog_ID) }}">{{ $item->Jadwal_Tayang }}</a></td><td> {{ $item->Prog_Nama}} </td>
                </tr>
                @endforeach
                <tbody>
            </table>
    <div class="pagination"> {!! $programs1->render() !!} </div>
</div>

@endsection