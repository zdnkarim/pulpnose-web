<?php

namespace App\Http\Controllers;

use App\Models\{Disease, History,Rule,HistoryDetail, Symptom};
use Illuminate\Http\Request;
use Auth;

class DiagnoseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function postNewHistory()
    {
        $history = new History();
        $history->user_id = Auth::user()->id;
        $history->save();
        return redirect('/diagnose/show');
    }
    
    public function showDiagnose()
    {
        $data = Symptom::all();
        return view('pulpa.diagnose.diagnose',compact('data'));
    }

    public function postHistoryDetail(Request $request)
    {
        $uid = Auth::user()->id;
        $disease = Disease::all();
        $historyId = History::where('user_id',$uid)->orderBy('id','DESC')->first()->id;
        $symptom = $request->symptom;
        $ruleData = [];

        if($symptom){

            $ruleData = $this->findRuleBySymptom($ruleData, $symptom);

            $this->saveToHistoryDetail($ruleData, $historyId);
            
            $dataByDisease = $this->clusterRuleByDisease($disease, $ruleData); 

            $cfScoreByDisease = $this->calculateCf($dataByDisease);
            // dd($cfScoreByDisease);

            $this->saveToHistory($cfScoreByDisease, $historyId, $disease);            

            return redirect('/result/'.$historyId);
        }else{
            return redirect('/result');
        }
    }

    public function findRuleBySymptom($ruleData, $symptom)
    {
        foreach($symptom as $sympId){
            $rule = Rule::where('symptom_id',$sympId)->get();
            foreach($rule as $r){
                $count = count($ruleData);
                $ruleData[$count++] = $r->id;
            }
        }
        return $ruleData;
    }

    public function saveToHistoryDetail($ruleData, $historyId)
    {   
        foreach($ruleData as $rd){
            $data = new HistoryDetail();
            $data->rule_id = $rd;
            $data->history_id = $historyId;
            $data->save();
        }
    }

    public function clusterRuleByDisease($disease, $ruleData)
    {
        $disease = Disease::all();
        foreach($disease as $d){
            $dataByDisease[] = [];
        }
        $index = 0;
        foreach($disease as $di){
            foreach($ruleData as $rd){
                $data = Rule::where('id',$rd)->first();
                if($data->disease_id == $di->id){
                    $dataByDisease[$index][] = $data->id;
                }
            }
            $index++;
        }
        return $dataByDisease;
    }

    public function calculateCf($dataByDisease)
    {
        $index = 0;
        $rule = Rule::all();
        $disease = Disease::all();
        
        foreach($dataByDisease as $dbd){
            $cfS = 0;
            $unique = [];
            foreach($dbd as $db){
                $symptom = Rule::where('id',$db)->first()->symptom_id;
                $true = 1;
                foreach($rule as $r){
                    if($symptom == $r->symptom_id && $r->disease_id != $disease[$index]->id){
                        $true = 0;
                    }
                }
                if($true == 1){
                    $unique[] = $db;
                }   
            }
            if(count($unique) != 0){
                foreach($dbd as $db){
                    $cf = Rule::where('id',$db)->first()->cf;
                    $cfS = $cfS + ($cf * (1 - $cfS));
                }
            }
            
            $cfScoreByDisease[$index] = $cfS;
            $index++;
        }
        return $cfScoreByDisease;
    }

    public function saveToHistory($cfScoreByDisease, $historyId, $disease)
    {
        // $isTrue = true;
        // $index = count($cfScoreByDisease);
        // // dd($cfScoreByDisease);
        // while($isTrue == true){
        //     $cfNow = $cfScoreByDisease[($index-1)];
        //     if(array_sum($cfScoreByDisease)==0){
        //         $cfSave = null;
        //         $isTrue = false;
        //     }elseif($cfNow != 0){
        //         $cfSave = $cfNow;
        //         $isTrue = false;
        //     }
        //     $index--;
        // }
        $cfSave = max($cfScoreByDisease);    

        $index = 0;

        foreach($cfScoreByDisease as $csbd){
            if($cfSave == $csbd){
                $iCf = $index;
            }
            $index++;
        }
        $historyData = History::where('id',$historyId)->first();
        $historyData->cf = $cfSave;
        if(array_sum($cfScoreByDisease) == 0){
            $historyData->result = null;
        }else{
            $historyData->result = $disease[$iCf]->id;
        }

        $historyData->save();
    }
}
