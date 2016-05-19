@extends('layouts.admin_template')

@section('content')
    <h1>Summary Program</h1>

    <div class="row">
    <div class="col-md-12">
    <div class="invoice" style="margin: 0px 0px;">
          <h3>{{ $summary->programs->Prog_Nama }} : {{ $summary->Tanggal_Sum}}</h3>
            <hr>
        
            <h4>Deskripsi : {{ $summary->programs->Prog_Deskripsi }}</h4>
            <h4>Rata-rata Rating : {{ $rating }}</h4>
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
                    <th>Menit Ke</th><th>{{ trans('Nama Artis') }}</th><th>{{ trans('Rating') }}</th><th>{{ trans('Deskripsi') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($rpm as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->artist->Nama_Artis }}</a></td><td>{{ $item->Rating }}</td><td>{{ $item->Deskripsi }}</td>
                    <td>

                        {!! Form::model($rpm, [
                            'method' => 'PATCH',
                            'url' => ['/rpm/edits2', $item->Rpm_ID],
                            'style' => 'display:inline'
                        ]) !!}

                        {!! Form::submit('Update', ['class' => 'btn btn-primary btn-xs']) !!}

                        {!! Form::close() !!}


                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/rpm', $item->Rpm_ID],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
       
    </div>

      <div class="box-footer">
        <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#modalrpm">Membuat Rating Per Menit</button>
    </div>

    </div>
    </div>


<!-- tutup box -->

    </div>
@if(!is_null($summary))    
@include('summary.modalrpm')
@endif

@endsection