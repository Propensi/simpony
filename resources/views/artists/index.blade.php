@extends('layouts.admin_template')

@section('content') 

    <h1>Mengelola Artis <a href="{{ url('artists/create') }}" class="btn btn-primary pull-right btn-sm">Mendaftarkan Nama Artis</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Artis ID</th><th>Nama Artis</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($artists as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!-- <td>{{ $x }}</td> -->
                    <td>{{ $item->Artis_ID }}</td><td><a href="{{ url('artists', $item->Artis_ID) }}">{{ $item->Nama_Artis }}</a></td>
                    <td>
                        <a href="{{ url('artists/' . $item->Artis_ID . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['artists', $item->Artis_ID],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $artists->render() !!} </div>
    </div>

@endsection
