<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Program;
use App\Jadwaltayang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class JadwaltayangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $jadwaltayangs = Jadwaltayang::paginate(15);

        return view('jadwaltayangs.index', compact('jadwaltayangs'));
    }

    public function jadwalharian()
    {
        $jadwaltayangs = Jadwaltayang::paginate(15);

        return view('executive.jadwalharian', compact('jadwaltayangs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $programs = \DB::table('programs')->lists('Prog_Nama', 'Prog_ID');
        // key nya ID, di list berupa angka. di save data berupa judul program
        
        return view('jadwaltayangs.create', compact('programs', $programs));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $data)
    {

        $namanya_program = Program::where('Prog_ID', '=', $data['Prog_Nama'])->first();
        // Jadwaltayang::create($request->all());        
        Jadwaltayang::create([
            // 'Jadwal_ID' => $data['Jadwal_ID'],
            'Prog_ID' => $data['Prog_Nama'],

            'Nama_Program' => $namanya_program->Prog_Nama,
            'Tanggal' => $data['Tanggal'],
            'Time' => $data['Time']
        ]);

        Session::flash('flash_message', 'Jadwaltayang added!');

        return redirect('jadwaltayangs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $jadwaltayang = Jadwaltayang::findOrFail($id);

        return view('jadwaltayangs.show', compact('jadwaltayang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $jadwaltayang = Jadwaltayang::findOrFail($id);

        return view('jadwaltayangs.edit', compact('jadwaltayang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        
        $jadwaltayang = Jadwaltayang::findOrFail($id);
        $jadwaltayang->update($request->all());

        Session::flash('flash_message', 'Jadwaltayang updated!');

        return redirect('jadwaltayangs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        Jadwaltayang::destroy($id);

        Session::flash('flash_message', 'Jadwaltayang deleted!');

        return redirect('jadwaltayangs');
    }
}
