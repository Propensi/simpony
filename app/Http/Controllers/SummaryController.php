<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Rpm;
use App\Summary;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;

class SummaryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $summary = Summary::paginate(15);

        return view('summary.index', compact('summary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('summary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        
        $duplikasi = Summary::where('Prog_ID','=',$request->Prog_ID)->where('Tanggal_Sum','=',$request->Tanggal_Sum)->first();
        
        if(!is_null($duplikasi)) {
                    $error = "Summary sudah ada di Program ini.";
                    return Redirect::back()->withErrors($error);
        }

        Summary::create($request->all());

        Session::flash('flash_message', 'Summary added!');

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
        $summary = Summary::findOrFail($id);

        return view('summary.show', compact('summary','rpm'));
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
        $summary = Summary::findOrFail($id);

        return view('summary.edit', compact('summary'));
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
        
        $summary = Summary::findOrFail($id);
        $summary->update($request->all());

        Session::flash('flash_message', 'Summary updated!');

        return redirect('summary');
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
        Summary::destroy($id);

        Session::flash('flash_message', 'Summary deleted!');

        return Redirect::back();
    }

    public function rpm($id)
    {
        $summary = Summary::findOrFail($id);
        $rpm = Rpm::where('Sum_ID','=',$id)->paginate(15);
        $artis = \DB::table('artists')->lists('Nama_Artis', 'Artis_ID');
        $rating = \DB::table('ratingpermenit')->where('Sum_ID','=',$id)->avg('Rating');

        return view('summary.ratingpermenit', compact('summary','rpm','artis','rating'));
        
    }

}
