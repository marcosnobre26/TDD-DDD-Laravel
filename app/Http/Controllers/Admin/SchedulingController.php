<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\User;
use App\Models\Scheduling;
use Illuminate\Http\Request;

class SchedulingController extends Controller
{
    public function __construct(){}

    public function store(Request $request)
    {
        $clinic = Clinic::where('id',$request->clinic_id)->first();

        $user = User::where('id',$request->user_id)->first();
        $doctor = User::where('id',$request->doctor_id)->first();

        $scheduling = new Scheduling();
        $scheduling->user_id = $user->id;
        $scheduling->clinic_id = $clinic->id;
        $scheduling->doctor_id = $doctor->id;
        $scheduling->reason_for_consultation = $request->reason_for_consultation;
        $scheduling->time = $request->time;
        $scheduling->save();

        return response()->json($scheduling, 200);
    }

    public function update(Request $request, int $id)
    {
        $scheduling = Scheduling::where('id',$id)->first();
        $scheduling->user_id = $request->id;
        $scheduling->clinic_id = $request->id;
        $scheduling->time = $request->time;
        $scheduling->doctor_id = $request->id;
        $scheduling->reason_for_consultation = $request->reason_for_consultation;
        $scheduling->save();

        return response()->json($scheduling, 200);
    }

    public function delete(int $id)
    {
        $scheduling = Scheduling::where('id',$id)->first();
        $scheduling->delete();

        return response()->json(['Agendamento deletado com sucesso.'], 200);
    }

    public function get(int $id)
    {
        $scheduling = Scheduling::where('id',$id)->first();
        return response()->json($scheduling, 200);
    }

    public function all()
    {
        $scheduling = Scheduling::get();
        return response()->json($scheduling, 200);
    }
}