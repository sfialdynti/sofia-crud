<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function user(){
        return view('template.user-table');
    }

    public function show(){
        $data['user'] = User::orderby('name', 'asc')->get();
        
        return view( 'template.user-table', $data);
    }

    public function create(){
        return view('template.form-user');
    }

    public function add(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect('/user');
    }

    public function edit(Request $request){
        $data['user'] = User::find($request->id);

        return view ('/user', $data);
    }

    public function update(Request $request){

        $update = User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : DB::raw('password')
        ]);

        return redirect('/user');
    }

    public function delete(Request $request){
        $user = User::find($request->id);
        $delete = User::where('id', $request->id)->delete();
        
        return redirect('/user');
    }


}
