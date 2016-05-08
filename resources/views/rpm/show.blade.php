@extends('layouts.admin_template')

@section('content')

    <h1>rpm</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('Artis_ID') }}</th><th>{{ trans('Rating') }}</th><th>{{ trans('Deskripsi') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $rpm->id }}</td> <td> {{ $rpm->Artis_ID }} </td><td> {{ $rpm->Rating }} </td><td> {{ $rpm->Deskripsi }} </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection