<?php

namespace App\Http\Controllers;

use App\Models\{History,HistoryDetail,Disease,Rule, Symptom};
use Illuminate\Http\Request;
use Auth;

class UnknownController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function history()
    {
        $uid = Auth::user()->id;
        $data = History::where('user_id',$uid)->get();
        $isDashboard = false;
        return view('pulpa.history.data',compact('data','isDashboard'));
    }

    public function historyDetail ($id)
    {
        $isDashboard = false;
        $data = HistoryDetail::where('history_id',$id)->get();
        $disease = Disease::all();
        $symptom = [];
        foreach($data as $d){
            $symptom[] = $d->rules->symptom_id;
        }
        $uniqueSymptom = array_unique($symptom);

        $symptomData = [];
        foreach($uniqueSymptom as $us){
            $symptomData[] = Symptom::where('id',$us)->first();
        } 
        return view('pulpa.history.detail.detail',compact('data','isDashboard','disease','symptomData'));
    }

    public function disease()
    {
        $data = Disease::all();
        $isDashboard = false;
        return view('pulpa.disease.data',compact('data','isDashboard'));
    }

    public function diseaseDetail($id)
    {
        $data = Disease::find($id);
        $isDashboard = false;
        return view('pulpa.disease.show',compact('data','isDashboard'));
    }

    public function result ($id)
    {
        $sick = true;
        $data = History::where('id',$id)->first();
        // dd($data);
        return view('pulpa.result.result',compact('data','sick'));
    }
}
