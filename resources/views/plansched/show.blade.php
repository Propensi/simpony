@extends('layouts.admin_template')

@section('content')

    <h1>Program Acara</h1>
    <div class="row">
        <div class="col-md-12">
    <div class="invoice" style="margin: 0px 0px;">
            <h2>{{ $program->Prog_Nama }}</h2>
            <hr>
        
            <h5>Deskripsi : {{ $program->Prog_Deskripsi }}</h5>
    </div>
    </div>
    </div>

@endsection