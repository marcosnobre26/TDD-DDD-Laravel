<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galleries;
use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    public function __construct(){}

    public function store(Request $request)
    {
        $gallerie = new Galleries();
        $gallerie->type_provider = $request->type_provider;
        $gallerie->url_image = $request->url_image;
        $gallerie->hora_fim = $request->hora_fim;
        $gallerie->type_media = $request->type_media;
        $gallerie->provider_id = $request->provider_id;
        $gallerie->save();

        return response()->json($gallerie, 200);
    }

    public function update(Request $request, int $id)
    {
        $gallerie = Galleries::where('id',$id)->first();
        $gallerie->type_provider = $request->type_provider;
        $gallerie->url_image = $request->url_image;
        $gallerie->hora_fim = $request->hora_fim;
        $gallerie->type_media = $request->type_media;
        $gallerie->provider_id = $request->provider_id;
        $gallerie->save();

        return response()->json($gallerie, 200);
    }

    public function delete(int $id)
    {
        $gallerie = Galleries::where('id',$id)->first();
        $gallerie->delete();

        return response()->json(['Clinica deletada com sucesso.'], 200);
    }

    public function get(int $id)
    {
        $gallerie = Galleries::where('id',$id)->first();
        return response()->json($gallerie, 200);
    }

    public function all()
    {
        $gallerie = Galleries::get();
        return response()->json($gallerie, 200);
    }
}