<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use App\User;
use Auth;
use DB;
use App\Assignment;
use App\Assignment2;
use App\Summary;
use App\Jadwaltayang;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function gm()
    {
        $current = date("Y/m/d");
    	$jadwaltayangs = Jadwaltayang::where("Tanggal",'=',$current)->orderBy('Time','asc')->paginate(15);
        $promosi = Assignment::where('Hg_Val','!=',1)->where('Hod_Val','!=',1)->count();    
        $research = Assignment2::where('Status','=','Proses')->count();
        $total = $promosi + $research;

        $rating = Summary::where("Prog_ID",'=',1)->get();

            $work = DB::select(DB::raw( "SELECT count(*) as jumlah, Tgl_Deadline FROM `assignments` group BY Tgl_Deadline "));

        return view('dashboard.gm', compact('stats','jadwaltayangs','promosi','research','total','rating','work'));
    }

     public function hg()
    {
        $current = date("Y/m/d");
        $jadwaltayangs = Jadwaltayang::where("Tanggal",'=',$current)->orderBy('Time','asc')->paginate(15);
        $promosi = Assignment::where('Hg_Val','!=',1)->where('Hod_Val','!=',1)->count(); 
        
        return view('dashboard.hg', compact('stats','jadwaltayangs','promosi'));
    }

     public function hod()
    {
        $current = date("Y/m/d");
        $jadwaltayangs = Jadwaltayang::where("Tanggal",'=',$current)->orderBy('Time','asc')->paginate(15);
        $promosi = Assignment::where('Hg_Val','!=',1)->where('Hod_Val','!=',1)->count();    
        
        return view('dashboard.gm', compact('stats','jadwaltayangs','promosi'));
    }


        public function role()
    {
        if(Auth::user()->role == 'General Manager') {
            return $this->gm();
        } elseif (Auth::user()->role == 'Head of Dept') {
            return $this->hod();
        } elseif (Auth::user()->role == 'Head Group') {
            return $this->hg();
        } else {
            return redirect('/home');
        }


    }
}
