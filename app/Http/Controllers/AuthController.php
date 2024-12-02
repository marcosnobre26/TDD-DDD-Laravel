<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use App\Models\DoctorSpecialty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'type' => $request->type,
        ]);

        $user->save();

        if($request->type == 1 && !is_null($request->speciality_id)){
            DoctorSpecialty::create([
                'doctor_id' => $user->id,
                'speciality_id' => $request->speciality_id,
            ]);
        }
        elseif ($request->type == 1 && is_null($request->speciality_id)){
            $user->delete();
            return response()->json("Informe a especialidade do medico.", 400);
        }
        
        $token = auth('api')->login($user);

        return $this->respondWithToken($token);
    }
     
     public function login(Request $request)
     {
        $credentials = $request->only('email', 'password');
        $token = auth('api')->attempt($credentials);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
     
        return $this->respondWithToken($token);
     }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function userProfile()
    {
        return response()->json(auth()->user());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
