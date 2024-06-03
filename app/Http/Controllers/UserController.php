<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    public function __construct()
    {
        //commented for development
        $this->middleware('auth');
    }

    public function index($id ='')
    {
       if($id){
           $users = User::find($id);
           return view('users.index',compact('users'));

       }else{
           $users = User::get();
           return view('users.index',compact('users'));

        }
    }

    public function userGroup()
    {
        $users = User::get();
        $users = json_encode($users);
        $groups = Group::get();
        $roles = Roles::get();
        return view('users.users',compact('users','groups','roles'));
    }

    public function userAdmin()
    {
        return view('layouts.admin');
    }

    public function add()
    {
        $groups = Group::get();
        $roles = Roles::get();
       return view('users.add',compact('groups','roles'));
    }

     public function create(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return redirect()->route('usergroups');  
    }

    public function edit(string $id)
    {
        $groups = Group::get();
        $roles = Roles::get();
        $user = User::find($id);
       return view('users.edit',compact('groups','roles','user'));
    }

     public function update(Request $request, string $id)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);

          $input = request()->except(['_token']);
          if(!empty($input['password'])){
            $input['password'] = bcrypt($input['password']);
           }
        $updated = User::where('id', $id)->update($input);

         return redirect()->route('users');
    
    }

     public function destroy(string $id)
    {
        
        User::where('id', $id)->delete();
       return redirect()->route('users');
    
    }

}
