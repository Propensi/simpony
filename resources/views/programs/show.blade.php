@extends('layouts.admin_template')

@section('content')

    <h1>Program</h1>
    <div class="invoice">
            <h2>{{ $program->Prog_Nama }}</h2>
            <hr>
        
            <h3>Deskripsi : {{ $program->Prog_Deskripsi }}</h3>
    </div>

@endsection