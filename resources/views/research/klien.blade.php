@extends('layouts.admin_template')

@section('content')
    <h1>Summary Program</h1>

    <div class="row">
    <div class="col-md-12">
    <div class="invoice" style="margin: 0px 0px;">
            <h3>{{ $assignments2->program->Prog_Nama }} : {{ $assignments2->Tanggal}}</h3>
            <hr>
        
            <h4>Deskripsi : {{ $assignments2->program->Prog_Deskripsi }}</h4>
            <h4>Rata-rata Rating : {{ $rating }}</h4>
            <h4>Status : {{ $assignments2->Status }}</h4>
    </div>
    </div>
    </div>

<br>

<div class="row">
    <div class="col-md-12">
        <div class="box">
               
    <div class="box-header with-border">
            <h3 class="box-title">Rating Per Menit</h3>


            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
    </div>
    <div class="box-body">

         
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Menit Ke</th><th>{{ trans('Nama Artis') }}</th><th>{{ trans('Rating') }}</th><th>{{ trans('Deskripsi') }}</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($rpm as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->artist->Nama_Artis }}</a></td><td>{{ $item->Rating }}</td><td>{{ $item->Deskripsi }}</td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
       
    </div>


    </div>
    </div>

<!-- tutup box -->

    </div>

@endsection