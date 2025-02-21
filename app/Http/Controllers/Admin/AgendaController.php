<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function __construct(){}

    public function store(Request $request)
    {
        $agenda = new Agenda();
        $agenda->name = $request->name;
        $agenda->description = $request->description;
        $agenda->data = $request->data;
        $agenda->hora_inicio = $request->hora_inicio;
        $agenda->hora_fim = $request->hora_fim;
        $agenda->status = $request->status;
        $agenda->service_id = $request->service_id;
        $agenda->save();

        return response()->json($agenda, 200);
    }

    public function update(Request $request, int $id)
    {
        $agenda = Agenda::where('id',$id)->first();
        $agenda->name = $request->name;
        $agenda->description = $request->description;
        $agenda->data = $request->data;
        $agenda->hora_inicio = $request->hora_inicio;
        $agenda->hora_fim = $request->hora_fim;
        $agenda->status = $request->status;
        $agenda->service_id = $request->service_id;
        $agenda->save();

        return response()->json($agenda, 200);
    }

    public function delete(int $id)
    {
        $agenda = Agenda::where('id',$id)->first();
        $agenda->delete();

        return response()->json(['Clinica deletada com sucesso.'], 200);
    }

    public function get(int $id)
    {
        $agenda = Agenda::where('id',$id)->first();
        return response()->json($agenda, 200);
    }

    public function all()
    {
        $agenda = Agenda::get();
        return response()->json($agenda, 200);
    }
}