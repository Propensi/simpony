<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\artprog;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $artprogs = artprogs::paginate(15);

        return view('artprogs.index', compact('artprogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('artprogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        artprogs::create($request->all());

        Session::flash('flash_message', 'artprogs added!');

        return redirect('artprogs');
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
        $artprogs = artprogs::findOrFail($artprog_ID);
        $artists = Artist::paginate(15);

        return view('artprogs.show', compact('artprogs', 'artists'));
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
        $artprogs = artprogs::findOrFail($artprog_ID);

        return view('artprogs.edit', compact('artprogs'));
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
        
        $artprogs = artprogs::findOrFail($artprog_ID);
        $artprogs->update($request->all());

        Session::flash('flash_message', 'artprogs updated!');

        return redirect('artprogs');
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
        artprogs::destroy($artprog_ID);

        Session::flash('flash_message', 'artprogs deleted!');

        return redirect('artprogs');
    }

    public function jadwalharian()
    {
        
        $artprogs1 = artprogs::paginate(15);
        return view('artprogs.jadwalharian', compact('artprogs1')); //array di index
        
    }

    

}
