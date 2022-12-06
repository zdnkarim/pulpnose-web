<?php

namespace App\Http\Controllers;

use App\Models\{History,HistoryDetail,Disease,Symptom};
use Illuminate\Http\Request;

class HistoryDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }

    public function detail($id)
    {
        $isDashboard = true;
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
}
