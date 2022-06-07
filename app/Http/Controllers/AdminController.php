<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use App\Models\Review;
use App\Models\Category;
use App\Models\City;
use App\Models\Type;
use App\Models\types_has_restaurants;
use App\Models\categories_has_restaurants;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addCategory(Request $request)
    {
        $cat = new Category;
        $cat->category = $request->category;
        $cat->save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function addCity(Request $request)
    {
        $city = new City;
        $city->city_name = $request->city_name;
        $city->save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function updateReviewStatus(Request $request, $status)
    {
        $review = Review::where('id', $request->id)->update(['status' => $status]);

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function updateUserStatus(Request $request, $status)
    {
        $user = User::where('id', $request->id)->update(['status' => $status]);

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function updateRestaurantStatus(Request $request, $status)
    {
        $review = Restaurant::where('id', $request->id)->update(['status' => $status]);

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function addType(Request $request)
    {
        $type = new Type;
        $type->type = $request->type;
        $type->save();

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function addRestro(Request $request)
    {
        $restro = new Restaurant;
        $restro->name = $request->name;
        $restro->description = $request->description;
        $restro->image = $request->image;
        $restro->status = $request->status;
        $restro->city_id = $request->city_id;
        $restro->save();

        $cat = new categories_has_restaurants;
        $cat->restaurant_id = $restro->id;
        $cat->category_id = $request->cat_id;
        $cat->save();

        $type = new types_has_restaurants;
        $type->restaurants_id = $restro->id;
        $type->types_id = $request->types_id;
        $type->save();

        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
