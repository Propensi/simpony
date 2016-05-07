@extends('layouts.admin_template')

@section('content')
    <h1>Programs <a href="{{ url('programs/create') }}" class="btn btn-primary pull-right btn-sm">Add New Program</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th><th>Nama Program</th><th> Deskripsi </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($programs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('programs', $item->Prog_ID) }}">{{ $item->Prog_Nama }}</a></td><td>{{ $item->Prog_Deskripsi }}</td>
                    <td>
                        <a href="{{ url('programs/' . $item->Prog_ID . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['programs', $item->Prog_ID],
                            'style' => 'display:inline',
                            'class' => 'delete'
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

    <script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>
@endsection
