<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use App\User;
use DB;
use App\Assignment;
use App\Assignment2;
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
        return view('dashboard.gm', compact('stats','jadwaltayangs','promosi','research','total'));
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


}
