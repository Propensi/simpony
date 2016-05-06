<?php
 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Artist;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;

class ArtistsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $artists = Artist::paginate(15);

        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        Artist::create($request->all());

        Session::flash('flash_message', 'Artist added!');

        return redirect('artists');
    }

    public function save(Request $request)
    {
        
        Artist::create($request->all());

        Session::flash('flash_message', 'Artist added!');

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $artist = Artist::findOrFail($id);

        return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $artist = Artist::findOrFail($id);

        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $artist = Artist::findOrFail($id);
        $artist->update($request->all());

        Session::flash('flash_message', 'Artist updated!');

        return redirect('artists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Artist::destroy($id);

        Session::flash('flash_message', 'Artist deleted!');

        return redirect('artists');
    }

}
