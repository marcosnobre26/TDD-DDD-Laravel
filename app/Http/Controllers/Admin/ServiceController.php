<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(){}

    public function store(Request $request)
    {
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->type_provider = $request->type_provider;
        $service->provider_id = $request->provider_id;
        $service->save();

        return response()->json($service, 200);
    }

    public function update(Request $request, int $id)
    {
        $service = Service::where('id',$id)->first();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->type_provider = $request->type_provider;
        $service->provider_id = $request->provider_id;
        $service->save();

        return response()->json($service, 200);
    }

    public function delete(int $id)
    {
        $service = Service::where('id',$id)->first();
        $service->delete();

        return response()->json(['Clinica deletada com sucesso.'], 200);
    }

    public function get(int $id)
    {
        $service = Service::where('id',$id)->first();
        return response()->json($service, 200);
    }

    public function all()
    {
        $service = Service::get();
        return response()->json($service, 200);
    }
}