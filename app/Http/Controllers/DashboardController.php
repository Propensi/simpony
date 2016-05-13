<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use App\User;
use DB;
use App\Assignment;
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
    	$jadwaltayangs = Jadwaltayang::where("Tanggal",'=',$current)->paginate(15);

        return view('dashboard.gm', compact('stats','jadwaltayangs'));
    }


}
