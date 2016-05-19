@extends('layouts.admin_template')

@section('content')
@include('layouts.flash')
<h1>Melacak Data Riset</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th><th>Nama Program</th><th>Tanggal</th><th>Status</th><th>Deskripsi</th><th>Action</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($assignments2 as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('assignments2/'.$item->Assn_ID.'/klien') }}">{{ $item->program->Prog_Nama }}</a></td>
                    <td>{{ $item->Tanggal }}</td>
                    <td>{{ $item->Status }}</td>
                    <td>{{ $item->Deskripsi }}</td>
                    <td>
                         <a href="{{ url('assignments2/' . $item->Assn_ID . '/klien') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Melihat Data Riset</button>
                        </a>
                     </td>
                                </div>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $assignments2->render() !!} </div>
    </div>

@endsection