<?php

namespace App\Http\Controllers\API;

use App\Reserve;
use Illuminate\Routing\Controller;

class ReserveController extends Controller
{
    public function index()
    {
        $reserve = Reserve::all();

        return response()->json([
            'error ' => false,
            'reserves' => $reserve
        ], 200);
    }

    public function student_reserves_shows($id){

    }
}
