<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Rpm;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Summary;

class RpmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $rpm = Rpm::paginate(15);

        return view('rpm.index', compact('rpm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('rpm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        Rpm::create($request->all());

        Session::flash('flash_message', 'Rpm added!');

        return Redirect::back();
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
        $rpm = Rpm::findOrFail($id);

        return view('rpm.show', compact('rpm'));
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
        $rpm = Rpm::findOrFail($id);

        return view('rpm.edit', compact('rpm'));
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
        $rpm = Rpm::findOrFail($id);
        $rpm->update($request->all());

        Session::flash('flash_message', 'Rpm updated!');

        $idr = $rpm->Sum_ID;
        $summary = Summary::findOrFail($rpm->Sum_ID);

        $rpm = Rpm::where('Sum_ID','=',$idr)->paginate(15);
        $artis = \DB::table('artists')->lists('Nama_Artis', 'Artis_ID');
        $rating = \DB::table('ratingpermenit')->where('Sum_ID','=',$idr)->avg('Rating');

        return view('summary.ratingpermenit', compact('summary','rpm','artis','rating'));

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
        Rpm::destroy($id);

        Session::flash('flash_message', 'Rpm deleted!');

        return redirect('rpm');
    }

    public function delete($id)
    {
        Rpm::destroy($id);

        Session::flash('flash_message', 'Rpm deleted!');

        return Redirect::back();
    }
}
