<?php

namespace App\Http\Controllers\API;

use App\Day;
use App\Food;
use App\Libraries\JDF;
use App\Reserve;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DayController extends Controller
{
    public function index(Request $request)
    {
        $days = Day::all();

        $days = $this->checkReserves($days, $request->get('id'));

        return response()->json([
            'error' => false,
            'day' => $days
//            'foods' => $days->foods
        ], 200);
    }

    public function destroy($day)
    {
        $day = Day::find($day);
        $day->delete();
        return response()->json([
            'error' => false
        ], 200);
    }

    public function create(Request $request)
    {
        $name = $request->get('name');
        $date = $request->get('date');

        $day = new Day();
        $jdf = new JDF();

        $day->name = $name;
        $day->date = $date;
        $day->create_date = $jdf->getTimestamp();
        $day->save();

        if ($day)
            return response()->json([
                'error' => false
            ], 200);
        else
            return response()->json([
                'error' => true,
                'error_msg' => 'مشکلی بوجود آمده است !!'
            ], 200);
    }

    public function update(Request $request, $day)
    {
        $day = Day::find($day);
        $day->update($request->all());

        return response()->json([
            'error' => false
        ], 200);
    }

    public function checkReserves($days, $s_id)
    {
        $finalDays = array();
        foreach ($days as $day) {
            $reserve = Reserve::where([
                ["d_id", "=", $day->id],
                ["s_id", "=", $s_id]
            ])->get();

            if (count($reserve) > 0) {
                foreach ($reserve as $r) {
                    $food = Food::find($r->f_id)->first();
                    $day["f"] .= $food->name . '(' . $r->meal . '),';
                }
                $day['f'] = rtrim($day['f'], ',');
                array_push($finalDays, $day);
            } else {
                $day["f"] = "null";
                array_push($finalDays, $day);
            }
        }

        return $finalDays;
    }
}
