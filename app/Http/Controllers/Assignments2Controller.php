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
        $assignments2 = Assignment2::where('Sender','=',Auth::user()->user_ID)->where('Status','!=','Ditolak')->paginate(15);

        return view('research.pelacakan', compact('assignments2'));
    }

    public function index()
    {
        $assignments2 = Assignment2::where('Status','!=','Ditolak')->paginate(15);

        return view('research.melihat', compact('assignments2'));
    }

    public function indexditolak()
    {
        $assignments2 = Assignment2::where('Status','=','Ditolak')->paginate(15);

        return view('research.melihat', compact('assignments2'));
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
            Assignment2::create(array('Prog_ID' => $request->Prog_ID, 'Tanggal' => $request->Tanggal, 'Deksripsi' => $request->Deskripsi, 'Staff' => $request->Staff, 'Dept_ID' => $request->Dept_ID, 'Sender' => $request->Sender, 'Status' => $request->Status , 'Sum_ID' => $duplikasi->Sum_ID));

                return redirect('assignments2/pelacakan');
        }

        Assignment2::create(array('Prog_ID' => $request->Prog_ID, 'Tanggal' => $request->Tanggal, 'Deksripsi' => $request->Deskripsi, 'Staff' => $request->Staff, 'Dept_ID' => $request->Dept_ID, 'Sender' => $request->Sender, 'Status' => $request->Status));

        return redirect('assignments2/pelacakan');
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

        return view('research.staff', compact('summary','rpm','artis','rating','assignments2'));
    }


    public function klien($id)
    {
        $assignments2 = Assignment2::findOrFail($id);
        $summary = Summary::where('Sum_ID','=', $assignments2->Sum_ID)->first();
        if($assignments2->Status == 'Menunggu') {
            $rpm = [];
            $rating = '';    
        } elseif ($assignments2->Status == 'Ditolak') {
            $rpm = [];
            $rating = '';
        } else {
        $rpm = Rpm::where('Sum_ID','=',$assignments2->Sum_ID)->get();
        $rating = \DB::table('ratingpermenit')->where('Sum_ID','=',$assignments2->Sum_ID)->avg('Rating');
        }

        

        return view('research.klien', compact('summary','rpm','rating','assignments2'));
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

        //klo $request ditolak
        if($request->Status == 'Proses') {
            if($assignments2->Status == 'Ditolak') {
            $assignments2->update(array("Status" => 'Proses'));
            return redirect('assignments2/index');
            }
        }

        if($request->Status == 'Proses') {
            $duplikasi = Summary::where('Prog_ID','=',$request->Prog_ID)->where('Tanggal_Sum','=',$request->Tanggal_Sum)->first();
        
            if(!is_null($duplikasi)) {
                if($assignments2->Status == 'Menunggu') { 
                    $assignments2->update(array("Sum_ID" => $duplikasi->Sum_ID, "Status" => 'Proses'));
                }
                    return Redirect::back();
                
            }

        Summary::create($request->all());
        $sum = Summary::where('Prog_ID','=',$request->Prog_ID)->where('Tanggal_Sum','=',$request->Tanggal_Sum)->first();

        $assignments2->update(array("Sum_ID" => $sum->Sum_ID));
        }


        $assignments2->update($request->all());

        //kasi email penolakan

        Session::flash('flash_message', 'assignments2 updated!');

        return Redirect::back();
    }

}