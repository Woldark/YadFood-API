<?php

namespace App\Http\Controllers\API;

use App\Libraries\JDF;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json([
            'error' => false,
            'restaurants' => $restaurants
        ], 200);
    }

    public function store(Request $request)
    {
        $name = $request->get('name');

        $restaurant = new Restaurant();
        $jdf = new JDF();

        $restaurant->name = $name;
        $restaurant->create_date = $jdf->getTimestamp();
        $restaurant->save();

        if ($restaurant)
            return response()->json([
                'error' => false
            ], 200);
        else
            return response()->json([
                'error' => true,
                'error_msg' => 'خطا بوجود آمده است!!!'
            ], 200);
    }

    public function update(Request $request, $restaurant)
    {
        $name = $request->get('name');

        $restaurant = Restaurant::find($restaurant);
        $restaurant->name = $name;

        $restaurant->save();

        return response()->json([
            'error' => false
        ], 200);
    }

    public function destroy($restaurant)
    {
        $restaurant = Restaurant::find($restaurant);
        $restaurant->delete();

        return response()->json([
            'error' => false
        ], 200);
    }
}
