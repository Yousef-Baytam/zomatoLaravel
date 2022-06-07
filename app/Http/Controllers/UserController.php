<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;

class UserController extends Controller
{

    public function addUser(Request $request)
    {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->profile_pic = $request->profile_pic;
        $user->user_type_id = $request->user_type_id;
        $user->city_id = $request->city_id;
        $user->user_status = $request->user_status;
        $user->dob = $request->dob;
        $user->save();

        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
