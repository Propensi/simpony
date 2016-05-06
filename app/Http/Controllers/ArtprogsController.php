<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Artprog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Artist;

class ArtprogsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $artprog = Artprog::paginate(15);

        return view('artprog.index', compact('artprog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('artprog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $duplikasi = Artprog::where('Prog_ID','=',$request->Prog_ID)->where('Artis_ID','=',$request->Artis_ID)->first();
        
        if(!is_null($duplikasi)) {
                    $error = "Artis sudah terdaftar di Program ini.";
                    return Redirect::back()->withErrors($error);
        }
        
        Artprog::create($request->all());

        Session::flash('flash_message', 'artprog added!');

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($artprog_ID)
    {
        $artprog = Artprog::findOrFail($artprog_ID);
        $artists = Artist::paginate(15);

        return view('artprog.show', compact('artprog', 'artists'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($artprog_ID)
    {
        $artprog = Artprog::findOrFail($artprog_ID);

        return view('artprog.edit', compact('artprog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($artprog_ID, Request $request)
    {
        
        $artprog = Artprog::findOrFail($artprog_ID);
        $artprog->update($request->all());

        Session::flash('flash_message', 'artprog updated!');

        return redirect('artprog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($artprog_ID)
    {
        Artprog::destroy($artprog_ID);

        Session::flash('flash_message', 'artprog deleted!');

        return redirect('artprog');
    }

    public function jadwalharian()
    {
        
        $artprog1 = Artprog::paginate(15);
        return view('artprog.jadwalharian', compact('artprog1')); //array di index
        
    }

    

}
