<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Summary;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

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
        
        Summary::create($request->all());

        Session::flash('flash_message', 'Summary added!');

        return redirect('summary');
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

        return view('summary.show', compact('summary'));
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

        return redirect('summary');
    }

}
