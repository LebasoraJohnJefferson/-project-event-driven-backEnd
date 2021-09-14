<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAccountController extends Controller
{
  public function index(){
    //get all userAccount from database
    $users=UserAccount::all();
    return response()->json($users);
  }


  public function login(Request $request)
  {
    $this->validate($request, [
     'email' => 'required|email',
     'password' => 'required'
    ]);

    $user = UserAccount::where('email', $request->input('email'))->first();

    if (Hash::check($request->input('password'), $user->password)) {
    // The passwords match...

      // Generate Token
      $token = base64_encode(Str::random(40));
      UserAccount::where('email', $request->input('email'))->update(['token' => "$token"]);;

      return response()->json(['status' => 'success','token' => $token]);
    }
    else {
      return response()->json(['status' => 'fail'], 401);
    }
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

    // hash the password
    $hashedPassword = Hash::make($request->input('password'), ['rounds' => 12]);

    $user = new UserAccount();
    $user->firstName = $request->input('firstName');
    $user->lastName = $request->input('lastName');
    $user->userName = $request->input('userName');
    $user->email = $request->input('email');
    $user->password = $hashedPassword;
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
