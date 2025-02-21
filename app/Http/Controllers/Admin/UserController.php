<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){}

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->profile_picture = $request->profile_picture;
        $user->lat = $request->lat;
        $user->long = $request->long;
        $user->save();

        return response()->json($user, 200);
    }

    public function update(Request $request, int $id)
    {
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->type = $request->type;
        $user->profile_picture = $request->profile_picture;
        $user->lat = $request->lat;
        $user->long = $request->long;
        $user->save();

        return response()->json($user, 200);
    }

    public function delete(int $id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();

        return response()->json(['Clinica deletada com sucesso.'], 200);
    }

    public function get(int $id)
    {
        $user = User::where('id',$id)->first();
        return response()->json($user, 200);
    }

    public function all()
    {
        $user = User::get();
        return response()->json($user, 200);
    }
}