<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail;
use App\Assignment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Storage;
use validate;
use App\User;
use App\Rpm;
use App\Summary;
use App\Assignment2;
use App\Step; use App\Files;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

use App\Comment;

class Assignments2Controller extends Controller
{


public function indexstaff()
    {
        $assignment2 = Assignment2::paginate(15);

        return view('research.index', compact('research'));
    }

public function pelacakan()
    {
        $assignments2 = Assignment2::paginate(15);

        return view('research.pelacakan', compact('assignments2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

    	$duplikasi = Summary::where('Prog_ID','=',$request->Prog_ID)->where('Tanggal_Sum','=',$request->Tanggal)->first();
        
        if(!is_null($duplikasi)) {
                    $error = "Summary sudah ada di Program ini, silahkan melihat di halaman program.";
                    return Redirect::back()->withErrors($error);
        }

        Assignment2::create(array('Prog_ID' => $request->Prog_ID, 'Tanggal' => $request->Tanggal, 'Deksripsi' => $request->Deskripsi, 'Staff' => $request->Staff, 'Dept_ID' => $request->Dept_ID, 'Sender' => $request->Sender));

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function staff($id)
    {
        $assignments2 = Assignment2::findOrFail($id);
        $summary = Summary::where('Sum_ID','=', $assignments2->Sum_ID)->first();
        $rpm = Rpm::where('Sum_ID','=',$assignments2->Sum_ID)->get();

        $artis = \DB::table('artisprograms')->join('artists', function ($join) {
            $join->on('artisprograms.Artis_ID', '=', 'artists.Artis_ID');
        })->lists('Nama_Artis', 'artisprograms.Artis_ID');

        $rating = \DB::table('ratingpermenit')->where('Sum_ID','=',$assignments2->Sum_ID)->avg('Rating');

        return view('research.staff', compact('summary','rpm','artis','rating'));
    }

        public function show($id)
    {
        $notifikasi = Assignment2::findOrFail($id);

        return view('research.show', compact('notifikasi'));
    }

    public function membuatriset()
    {
        $programs = \DB::table('programs')->lists('Prog_Nama', 'Prog_ID');
        return view('rnd/datariset', compact('programs'));
    }


    public function update($id, Request $request)
    {
        
        $assignments2 = Assignment2::findOrFail($id);

        $assignments2->update($request->all());

        Session::flash('flash_message', 'assignments2 updated!');

        return Redirect::back();
    }

}