<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professional;
use Illuminate\Http\Request;

class ProfessionalController extends Controller
{
    public function __construct(){}

    public function store(Request $request)
    {
        $professional = new Professional();
        $professional->user_id = $request->user_id;
        $professional->speciality = $request->speciality;
        $professional->professional_register = $request->professional_register;
        $professional->verification_status = $request->verification_status;
        $professional->description = $request->description;
        $professional->save();

        return response()->json($professional, 200);
    }

    public function update(Request $request, int $id)
    {
        $professional = Professional::where('id',$id)->first();
        $professional->user_id = $request->user_id;
        $professional->speciality = $request->speciality;
        $professional->professional_register = $request->professional_register;
        $professional->verification_status = $request->verification_status;
        $professional->description = $request->description;
        $professional->save();

        return response()->json($professional, 200);
    }

    public function delete(int $id)
    {
        $professional = Professional::where('id',$id)->first();
        $professional->delete();

        return response()->json(['Clinica deletada com sucesso.'], 200);
    }

    public function get(int $id)
    {
        $professional = Professional::where('id',$id)->first();
        return response()->json($professional, 200);
    }

    public function all()
    {
        $professional = Professional::get();
        return response()->json($professional, 200);
    }
}