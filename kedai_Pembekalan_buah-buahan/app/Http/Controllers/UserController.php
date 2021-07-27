<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Authinterface()
    {
        return view('auth/users/createUser');
    }

    protected function createUser(Request $r)
    {
        $r->validate([
            'name'=>'required',
            'email'=>'email|unique:users',
            'password'=>'required|min:8',
        ],[
            'name.required'=>'Name field is required',
            'email.required'=>'Email field is required',
            'email.unique'=>'Email has already been taken',
            'password.required'=>'Password field is required',
            'password.min'=>'Password must be at least 8 characters',
        ]);
        $createUser = User::create([
            'name' => $r->name,
            'email' => $r->email,
            'position' => '2',
            'password' => Hash::make($r->password),
        ]);
        Session::flash('create', 'User create successful!');
        return redirect()->route('home');
    }


    public function showUser()
    {
        $user = User::getUsers('');
        return view('auth/users/manageUser')->with('user', $user);
    }

    public function getMoreUsers()
    {
        $r = request();
        $query = $r->search_query;
        if ($r->ajax()) {
            $user = User::getUsers($query);
            if(count($user)==0){
                return view('error/userNoResult');
            }
            return view('auth/users/usertable', compact('user'))->render();
        }
    }

    public function editUser($id)
    {
        $user = User::all()->where('id', $id);
        return view('auth/users/UpdateUser')->with('user', $user);
    }

    public function updateUser(Request $r)
    {
        $r->validate([
            'name'=>'required',
            'password'=>'required|min:8',
        ],[
            'name.required'=>'Name field is required',
            'password.required'=>'Password field is required',
            'password.min'=>'Password must be at least 8 characters',
        ]);
        $user = User::find($r->id);
        $user->name = $r->name;
        $user->password = Hash::make($r->password);
        $user->save();
        Session::flash('updateUser', 'User update successful!');
        return redirect()->route('showUser');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('deleteUser', 'Delete Sucessful');
        return redirect()->route('showUser');
    }

    public function editOwn($position)
    {
        $user = User::all()->where('position', $position);
        return view('auth/passwords/ownUpdate')->with('user', $user);
    }

    public function updateOwn(Request $r)
    {
        $r->validate([
            'name'=>'required',
            'password'=>'required|min:8',
        ],[
            'name.required'=>'Name field is required',
            'password.required'=>'Password field is required',
            'password.min'=>'Password must be at least 8 characters',
        ]);
        $user = User::find($r->position);
        $user->name = $r->name;
        $user->password = Hash::make($r->password);
        $user->save();
        Session::flash('updateOwn', 'Update successful!');
        return redirect()->route('home');
    }

}
