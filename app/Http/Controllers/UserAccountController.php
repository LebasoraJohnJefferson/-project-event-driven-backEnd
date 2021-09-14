<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;

class UserAccountController extends Controller
{
    public function index(){
        //get all userAccount from database
        $users=UserAccount::all();
        return response()->json($users);
    }
    public function store(Request $request){
        //POST data to db from user

        //validate
        $this->validate($request,[
            'firstName'=>'required',
            'lastName'=>'required',
            'userName'=>'required',
            'email'=>'required|email|unique:user_accounts',
            'password'=>'required',
            'address'=>'required',
        ]);

        $user = new UserAccount();
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->userName = $request->input('userName');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->address = $request->input('address');

        $user->save();
        return response()->json($user);

    }
    public function show($id){
        //give 1 item from db
        $user=UserAccount::find($id);
        return response()->json($user);
    }
    public function update(Request $request,$id){
        //update by id
         //validate
         $this->validate($request,[
            'firstName'=>'required',
            'lastName'=>'required',
            'userName'=>'required',
            'email'=>'required|email|unique:user_accounts',
            'password'=>'required',
            'address'=>'required',
        ]);

        $user = UserAccount::find($id);
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->userName = $request->input('userName');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->address = $request->input('address');

        $user->save();
        return response()->json($user);
    }
    public function destroy($id){
        //delete by id
        $user=UserAccount::find($id);
        $user->delete();
        return response()->json('user Account deleted successfully!');
    }
}
