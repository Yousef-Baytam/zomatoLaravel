<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function getAllRestros($id = null)
    {
        if ($id) {
            $restros = Restaurant::find($id);
        } else {
            $restros = Restaurant::all();
        }

        return response()->json([
            "status" => "Success",
            "restos" => $restros
        ], 200);
    }
}
