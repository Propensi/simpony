<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jadwaltayang;
use App\Program;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Artist;
use Illuminate\Support\Facades\Redirect;

class ProgramsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $programs = Program::paginate(15);

        return view('programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('programs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        //Program::create($request->all());
        //$programs = \DB::table('jadwaltayangs')->lists('Time', 'Jadwal_ID');


        Session::flash('flash_message', 'Program added!');

        return redirect('programs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($Prog_ID)
    {
        $program = Program::findOrFail($Prog_ID);
        $artists = \DB::table('artisprograms')->where('Prog_ID', '=' , $Prog_ID)->join('artists', function ($join) {
            $join->on('artisprograms.Artis_ID','=','artists.Artis_ID');
        })->get();
        $artis = \DB::table('artists')->lists('Nama_Artis', 'Artis_ID');



        return view('programs.show', compact('program', 'artists', 'artis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($Prog_ID)
    {
        $program = Program::findOrFail($Prog_ID);

        return view('programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($Prog_ID, Request $request)
    {
        
        $program = Program::findOrFail($Prog_ID);
        $program->update($request->all());

        Session::flash('flash_message', 'Program updated!');

        return redirect('programs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($Prog_ID)
    {
        Program::destroy($Prog_ID);

        Session::flash('flash_message', 'Program deleted!');

        return redirect('programs');
    }

    public function jadwalharian()
    {
        $current = date("Y/m/d");

        //$jadwaltayangs = Jadwaltayang::paginate(15);
        $jadwaltayangs = Jadwaltayang::orderBy('Time')->where('Tanggal', '=', $current)->paginate(15);

        return view('programs.jadwalharian', compact('jadwaltayangs'));        
    }
}
