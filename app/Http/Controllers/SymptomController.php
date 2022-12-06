<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Symptom;
use Carbon\Carbon;

class SymptomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }
    
    public function create(Request $request)
    {
        $nowTimeDate = Carbon::now();
        $symptom = new Symptom();
        $symptom->code = $request->code;
        $symptom->name = $request->name;
        $symptom->created_at = $nowTimeDate;
        $symptom->updated_at = $nowTimeDate;
        $symptom->save();
        return redirect('/dashboard/symptom');
    }

    public function data()
    {
        $data = Symptom::all();
        return view('pulpa.symptom.data',compact('data'));
    }

    public function show($id)
    {
        $data = Symptom::find($id);
        return view('pulpa.symptom.show',compact('data'));
    }

    public function update($id, Request $request)
    {
        $nowTimeDate = Carbon::now();
        $symptom = Symptom::find($id);
        $symptom->code = $request->code;
        $symptom->name = $request->name;
        $symptom->updated_at = $nowTimeDate;
        $symptom->save();
        return redirect('/dashboard/symptom');
    }

    public function isDelete($id)
    {
        $data = Symptom::find($id);
        return view('pulpa.symptom.delete',compact('data'));
    }

    public function delete($id)
    {
        Symptom::find($id)->delete();
        return redirect('/dashboard/symptom');
    }
}
