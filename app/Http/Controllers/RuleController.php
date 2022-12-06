<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Rule,Disease,Symptom};
use Carbon\Carbon;

class RuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }
    
    public function data()
    {
        $data = rule::all();
        $disease = Disease::all();
        $symptom = Symptom::all();
        // dd($data);
        return view('pulpa.rule.data',compact('data','disease','symptom'));
    }

    public function create(Request $request)
    {
        $nowTimeData = Carbon::now();
        $rule = new Rule();
        $rule->disease_id = $request->disease;
        $rule->symptom_id = $request->symptom;
        $rule->mb = $request->mb;
        $rule->md = $request->md;
        $rule->cf = $request->mb - $request->md;
        $rule->created_at = $nowTimeData;
        $rule->updated_at = $nowTimeData;
        $rule->save();
        return redirect('/dashboard/rule');
    }

    public function show($id)
    {
        $data = Rule::find($id);
        $disease = Disease::all();
        $symptom = Symptom::all();
        return view('pulpa.rule.show',compact('data','disease','symptom'));
    }

    public function update($id, Request $request)
    {
        $nowTimeData = Carbon::now();
        $rule = Rule::find($id);
        $rule->disease_id = $request->disease;
        $rule->symptom_id = $request->symptom;
        $rule->mb = $request->mb;
        $rule->md = $request->md;
        $rule->cf = $request->mb - $request->md;
        $rule->updated_at = $nowTimeData;
        $rule->save();
        return redirect('/dashboard/rule');
    }

    public function isdelete($id)
    {
        $data = Rule::find($id);
        return view('pulpa.rule.delete',compact('data'));
    }

    public function delete($id)
    {
        Rule::find($id)->delete();
        return redirect('/dashboard/rule');
    }
}
