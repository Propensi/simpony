@extends('layouts.admin_template')

@section('content')

    <h1>Rating Per Menit <a href="{{ url('/rpm/create') }}" class="btn btn-primary pull-right btn-sm">Add New rpm</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th><th>{{ trans('Nama Artis') }}</th><th>{{ trans('Rating') }}</th><th>{{ trans('Deskripsi') }}</th><th>Actions</th>
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
                        <a href="{{ url('/rpm/' . $item->Rpm_ID . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
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
        <div class="pagination"> {!! $rpm->render() !!} </div>
    </div>

@endsection
