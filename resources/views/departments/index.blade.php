@extends('layouts.admin_template')

@section('titles')

<!-- <div class="pageheader"><h1>Departments</h1> </div>-->
@endsection

@section('content')

    <h1>Departemen<a href="{{ url('departments/create') }}" class="btn btn-primary pull-right btn-sm">Buat Departemen Baru</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th>S.No</th> -->
                    <th>ID Departemen</th></th><th>Nama Departemen</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($departments as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!-- <td>{{ $x }}</td> -->
                    <td><a href="{{ url('departments', $item->Dept_ID) }}">{{ $item->Dept_ID }}</a></td>
                    <td><a href="{{ url('departments', $item->Dept_ID) }}">{{ $item->Dept_Name }}</a></td>
                    <td>
                        <a href="{{ url('departments/' . $item->Dept_ID . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Ubah</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['departments', $item->Dept_ID],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $departments->render() !!} </div>
    </div>

@endsection
