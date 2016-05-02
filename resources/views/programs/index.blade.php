@extends('layouts.master')

@section('content')

    <h1>Programs <a href="{{ url('programs/create') }}" class="btn btn-primary pull-right btn-sm">Add New Program</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Prog ID</th><th>Prog Nama</th><th>Jadwal Tayang</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($programs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('programs', $item->id) }}">{{ $item->Prog_ID }}</a></td><td>{{ $item->Prog_Nama }}</td><td>{{ $item->Jadwal_Tayang }}</td>
                    <td>
                        <a href="{{ url('programs/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['programs', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $programs->render() !!} </div>
    </div>

@endsection
