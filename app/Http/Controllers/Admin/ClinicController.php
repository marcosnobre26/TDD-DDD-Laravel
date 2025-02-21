<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function __construct(){}

    public function store(Request $request)
    {
        $clinic = new Clinic();
        $clinic->name = $request->name;
        $clinic->user_id = $request->name;
        $clinic->fantasy_name = $request->name;
        $clinic->cnpj = $request->name;
        $clinic->address = $request->name;
        $clinic->description = $request->name;
        $clinic->save();

        return response()->json($clinic, 200);
    }

    public function update(Request $request, int $id)
    {
        $clinic = Clinic::where('id',$id)->first();
        $clinic->name = $request->name;
        $clinic->user_id = $request->name;
        $clinic->fantasy_name = $request->name;
        $clinic->cnpj = $request->name;
        $clinic->address = $request->name;
        $clinic->description = $request->name;
        $clinic->save();

        return response()->json($clinic, 200);
    }

    public function delete(int $id)
    {
        $clinic = Clinic::where('id',$id)->first();
        $clinic->delete();

        return response()->json(['Clinica deletada com sucesso.'], 200);
    }

    public function get(int $id)
    {
        $clinic = Clinic::where('id',$id)->first();
        return response()->json($clinic, 200);
    }

    public function all()
    {
        $clinic = Clinic::get();
        return response()->json($clinic, 200);
    }
}