<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addRestro(Request $request)
    {
        $restro = new Restaurant();
        $restro->name = $request->name;
        $restro->description = $request->description;
        $restro->image = $request->image;
        $restro->status = $request->status;
        $restro->city_id = $request->city_id;
        $restro->save();

        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
