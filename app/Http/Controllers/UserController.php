<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAllReviews($id = null)
    {
        if ($id) {
            $reviews = Review::where('user_id', $id)->get();
        } else {
            $reviews = Review::all();
        }

        return response()->json([
            "status" => "Success",
            "reviews" => $reviews
        ], 200);
    }

    public function updateUser(Request $request)
    {
        User::where('id', $request->id)->update(['first_name' => $request->first_name, 'last_name' => $request->last_name, 'email' => $request->email, 'city_id' => $request->city_id, 'dob' => $request->dob]);

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function updateReview(Request $request)
    {
        Review::where([['user_id', $request->user_id], ['restaurant_id', $request->restaurant_id]])->update(['rating' => $request->rating, 'review' => $request->review]);

        return response()->json([
            "status" => "Success",
        ], 200);
    }

    public function addReview(Request $request)
    {
        $review = new Review;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->user_id = $request->user_id;
        $review->restaurant_id = $request->restaurant_id;
        $review->status = $request->status;
        $review->save();

        return response()->json([
            "status" => "Success"
        ], 200);
    }

    public function addUser(Request $request)
    {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->profile_pic = $request->profile_pic;
        $user->user_type_id = 1;
        $user->city_id = $request->city_id ? $request->city_id : '1';
        $user->user_status = 'pending';
        $user->dob = $request->dob;
        $user->save();

        return response()->json([
            "status" => "Success"
        ], 200);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->get();
        if (Hash::check($request->password, $user[0]->password)) {
            return response()->json([
                "status" => "Success",
                "user" => $user
            ], 200);
        }
        return response()->json([
            "status" => "Not Available",
        ], 404);
    }
}
