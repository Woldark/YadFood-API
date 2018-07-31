<?php

namespace App\Http\Controllers\API;

use App\Day;
use App\Libraries\JDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DayController extends Controller
{
    public function index()
    {
        $day = Day::find();

        return response()->json([
            'error' => false,
            'day' => $day,
            'foods' => $day->foods
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
}
