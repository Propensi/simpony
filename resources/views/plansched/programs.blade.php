@extends('layouts.admin_template')

@section('content')
    <h1>Mengelola Jadwal Program Acara</h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No.</th><th>Nama Program</th><th> Deskripsi </th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($programs as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/plansched/programs', $item->Prog_ID) }}">{{ $item->Prog_Nama }}</a></td><td>{{ $item->Prog_Deskripsi }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $programs->render() !!} </div>
    </div>

    <script>
    $(".delete").on("submit", function(){
        return confirm("Apakah Anda Yakin Untuk Menghapus Data Ini?");
    });
</script>
@endsection
