@extends('layouts.admin_template')

@section('content')

    <h1>Summary <a href="{{ url('summary/create') }}" class="btn btn-primary pull-right btn-sm">Add New Summary</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th><th>Nama Program</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($summary as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('summary', $item->Sum_ID) }}">{{ $item->Prog_Nama }}</a></td>
                    <td>
                        <a href="{{ url('summary/' . $item->Sum_ID . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['summary', $item->Sum_ID],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
                          <?php 
                    if($x == '0'){
                        echo 
                        '<td>Tidak ada summary program yang tersedia.</td><td></td><td></td><td></td><td></td><td></td>
                        ';
                    }
                    ?>
            </tbody>
        </table>
        <div class="pagination"> {!! $summary->render() !!} </div>
    </div>

@endsection
