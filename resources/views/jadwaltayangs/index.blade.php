@extends('layouts.admin_template')

@section('content')
<div class="col-md-10">

    <h1>Jadwaltayangs <a href="{{ url('/jadwaltayangs/create') }}" class="btn btn-primary pull-right btn-sm">Add New Jadwaltayang</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <!-- <th>S.No</th> -->
                    <th>NO.</th><th>{{ trans('jadwaltayangs.Nama_Program') }}</th><th>{{ trans('jadwaltayangs.Tanggal') }}</th><th>{{ trans('jadwaltayangs.Time') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($jadwaltayangs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <!-- <td><a href="{{ url('jadwaltayangs', $item->Jadwal_ID) }}">{{ $x }}</td> -->
                    <td>{{ $x }}</a></td>
                    <td>{{ $item->Nama_Program }}</td>
                    <td>{{ $item->Tanggal }}</td>
                    <td>{{ $item->Time }}</td>
                    <td>
                        <a href="{{ url('/jadwaltayangs/' . $item->Jadwal_ID . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/jadwaltayangs', $item->Jadwal_ID],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $jadwaltayangs->render() !!} </div>
    </div>

</div>
</div>
@endsection
