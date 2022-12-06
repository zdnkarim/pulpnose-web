<?php

use Illuminate\Support\Facades\Route;
use App\Models\RoleUser;
use App\Http\Controllers\{
    DiagnoseController,DiseaseController,UserController,SymptomController,UnknownController,
    HistoryController,RuleController,HistoryDetailController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pulpa.welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard',function (){
    if(! Auth::user()){
        return redirect('/login');
    }else{
        $idUser = Auth::user()->id;
        $query = RoleUser::where('user_id',$idUser)->first();
        if(empty($query->role_id)){
            return redirect('/');
        }else{
            $idRole = $query->role_id;
            if($idRole == 1){
                return redirect('/dashboard/user');
            }else{
                return redirect('/');
            }
        }
    }
});

Route::get('/dashboard/user', [UserController::class,'data']);
Route::get('/dashboard/user/{id}/show', [UserController::class,'show']);
Route::post('/dashboard/user/{id}/update', [UserController::class,'update']);
Route::get('/dashboard/user/{id}/isdelete', [UserController::class,'isdelete']);
Route::get('/dashboard/user/{id}/delete', [UserController::class,'delete']);

Route::get('/dashboard/disease', [DiseaseController::class,'data']);
Route::post('/dashboard/disease/create', [DiseaseController::class,'create']);
Route::get('/dashboard/disease/{id}/show', [DiseaseController::class,'show']);
Route::post('/dashboard/disease/{id}/update', [DiseaseController::class,'update']);
Route::get('/dashboard/disease/{id}/isdelete', [DiseaseController::class,'isdelete']);
Route::get('/dashboard/disease/{id}/delete', [DiseaseController::class,'delete']);

Route::get('/dashboard/symptom', [SymptomController::class,'data']);
Route::post('/dashboard/symptom/create', [SymptomController::class,'create']);
Route::get('/dashboard/symptom/{id}/show', [SymptomController::class,'show']);
Route::post('/dashboard/symptom/{id}/update', [SymptomController::class,'update']);
Route::get('/dashboard/symptom/{id}/isdelete', [SymptomController::class,'isdelete']);
Route::get('/dashboard/symptom/{id}/delete', [SymptomController::class,'delete']);

Route::get('/dashboard/rule', [RuleController::class,'data']);
Route::post('/dashboard/rule/create', [RuleController::class,'create']);
Route::get('/dashboard/rule/{id}/show', [RuleController::class,'show']);
Route::post('/dashboard/rule/{id}/update', [RuleController::class,'update']);
Route::get('/dashboard/rule/{id}/isdelete', [RuleController::class,'isdelete']);
Route::get('/dashboard/rule/{id}/delete', [RuleController::class,'delete']);

Route::get('/dashboard/history', [HistoryController::class,'data']);

Route::get('/dashboard/history/detail/{id}', [HistoryDetailController::class,'detail']);

Route::post('/diagnose',[DiagnoseController::class,'postNewHistory']);
Route::get('/diagnose/show',[DiagnoseController::class,'showDiagnose']);
Route::post('/diagnose/show/post',[DiagnoseController::class,'postHistoryDetail']);

Route::get('/history',[UnknownController::class,'history']);
Route::get('/history/detail/{id}', [UnknownController::class,'historyDetail']);
Route::get('/result/{id}',[UnknownController::class,'result']);

Route::get('result',function (){
    $sick = false;
    return view('pulpa.result.result',compact('sick'));
});