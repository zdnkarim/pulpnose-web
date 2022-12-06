<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disease;
use Carbon\Carbon;

class DiseaseController extends Controller
{

    

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    public function data()
    {
        $data = Disease::all();
        $isDashboard = true;
        return view('pulpa.disease.data',compact('data','isDashboard'));
    }

    public function create(Request $request)
    {
        $nowTimeDate = Carbon::now();
        $disease = new Disease();
        $disease->code = $request->code;
        $disease->name = $request->name;
        $disease->desc = $request->desc;
        $disease->first_aid = $request->first_aid;
        $disease->created_at = $nowTimeDate;
        $disease->updated_at = $nowTimeDate;
        $disease->save();
        return redirect('/dashboard/disease');
    }

    public function show($id)
    {
        $data = Disease::find($id);
        $isDashboard = true;
        return view('pulpa.disease.show',compact('data','isDashboard'));
    }

    public function update($id, Request $request)
    {
        $nowTimeDate = Carbon::now();
        $disease = Disease::find($id);
        $disease->code = $request->code;
        $disease->name = $request->name;
        $disease->desc = $request->desc;
        $disease->first_aid = $request->first_aid;
        $disease->updated_at = $nowTimeDate;
        $disease->save();
        return redirect('/dashboard/disease');
    }

    public function isDelete($id)
    {
        $data = Disease::find($id);
        return view('pulpa.disease.delete',compact('data'));
    }

    public function delete($id)
    {
        Disease::find($id)->delete();
        return redirect('/dashboard/disease');
    }
}
