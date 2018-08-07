<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Factory as Faker;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faker = Faker::create();
        $startDate = Carbon::now();

        $dates = array();
        for ($i = 1; $i <= 31; $i++) {
            $date = "2018-08-" . $i . " 0:0:0";
            $d=Carbon::createFromTimeString($date);
            $dates[]=$d;
        }
        $dates2 = array();
        foreach ($dates as $date){
            $dates2[] = explode(' ' ,(string)$date)[0];
        }

        return $dates2;
        return view('home');
    }
}
