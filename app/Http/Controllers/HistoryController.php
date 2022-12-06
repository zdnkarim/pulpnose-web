<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Auth;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }
    
    public function data()
    {
        $data = History::all();
        $isDashboard = true;
        return view('pulpa.history.data',compact('data','isDashboard'));
    }
}
