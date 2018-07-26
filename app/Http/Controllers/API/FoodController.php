<?php

namespace App\Http\Controllers\API;

use App\Day;
use App\Food;
use App\Libraries\JDF;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FoodController extends Controller
{
    public function index()
    {
        $food = Food::all();

        return response()->json([
            'error' => false,
            'foods' => $food->days
        ], 200);
    }

    public function daysFood($id)
    {
        $food = Food::find($id);

        return response()->json([
            'error' => false,
            'foods' => $food->days
        ], 200);
    }

    public function create(Request $request)
    {
        $name = $request->get('name');
        $price = $request->get('price');

        $food = new Food();
        $jdf = new JDF();

        $food->name = $name;
        $food->price = $price;
        $food->create_date = $jdf->getTimestamp();

        $food->save();
        $days = Day::all();

        foreach ($days as $day) {
            $food->days->attach($day);
        }

    }

    public function update(Request $request, $food)
    {
        $food = Food::find($food);
        $food->update($request->all());

        return response()->json([
            'error' => false
        ], 200);
    }

    public function destroy($food)
    {
        $food = Food::find($food);
        $food->delete();

        return response()->json([
            'error' => false
        ], 200);
    }
}
