<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Role,RoleUser};
use Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:ROLE_ADMIN');
    }
    
    public function data()
    {
        $data = User::all();
        return view('pulpa.user.data',compact('data'));
    }

    public function show($id)
    {
        $data = User::find($id);
        $role = Role::all();
        return view('pulpa.user.show',compact('data','role'));
    }

    public function update(Request $request, $id)
    {
        $data = RoleUser::where('user_id',$id)->first();
        // dd($data);
        $data->role_id = $request->role;
        $data->user_id = $id;
        // dd($data);
        $data->save();
        return redirect('/dashboard/user/');    
    }
    
    public function isdelete($id)
    {
        $data = User::find($id);
        return view('pulpa.user.delete',compact('data'));
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('/dashboard/user/');
    }
}
