<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function __construct(){}

    public function store(Request $request)
    {
        $specialty = new Specialty();
        $specialty->name = $request->name;
        $specialty->save();

        return response()->json($specialty, 200);
    }

    public function update(Request $request, int $id)
    {
        $specialty = Specialty::where('id',$id)->first();
        $specialty->name = $request->name;
        $specialty->save();

        return response()->json($specialty, 200);
    }

    public function delete(int $id)
    {
        $specialty = Specialty::where('id',$id)->first();
        $specialty->delete();

        return response()->json(['Especialidade deletada com sucesso.'], 200);
    }

    public function get(int $id)
    {
        $specialty = Specialty::where('id',$id)->first();
        return response()->json($specialty, 200);
    }

    public function all()
    {
        $specialty = Specialty::get();
        return response()->json($specialty, 200);
    }
}