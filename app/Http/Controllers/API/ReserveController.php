<?php

namespace App\Http\Controllers\API;

use App\Libraries\JDF;
use App\Reserve;
use Illuminate\Http\Request;
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

    public function save(Request $request)
    {
        $s_id = $request->get('s_id');
        $f_id = $request->get('f_id');
        $d_id = $request->get('d_id');

        $reserve = new Reserve();
        $jdf = new JDF();

        $reserve->s_id = $s_id;
        $reserve->f_id = $f_id;
        $reserve->d_id = $d_id;
        $reserve->create_date = $jdf->getTimestamp();
        $reserve->save();

        if ($reserve)
            return response()->json([
                'error' => false
            ], 200);
        else
            return response()->json([
                'error' => true,
                'error_msg' => 'مشکلی بوجود آمده است !!!'
            ]);
    }
}
