<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller

{
  public function login()
  {
  return view("auth.login");
}

  public function register()
  {
  return view("auth.register");
}
  public function registerUser(Request $request)
  {
  $request->validate([
  'name' => 'required',
  'email' => 'required|email|unique:users',
  'password' => 'required|min:6|max:12',
]);
  $user = new User;
  $user ->name =$request->name;
  $user ->email =$request->email;
  $user ->password = Hash::make($request->password);
  $res=$user->save();
  if( $res){
  return back()->with('success','You have successfully registered');
}
  else{
  return back()->with('fail');
}
}


 public function loginUser(Request $request)
 {
 $request->validate([
 'email' => 'required|email',
 'password' => 'required|min:6|max:12',
]);
 $user= User::where('email', $request->email)->first();
 if($user && Hash::check ($request->password,$user->password)){
 return redirect()->route('dashboard')->with('success','you are logged in successfully ');
}
else
{
 return back()->withErrors(['failed'=>"Invalid Username/Password"]); 
}
}
public function dashboard(Request $request)
{
 return view('dashboard');
}
public function logout()
{
 Session::flush();
 Auth::logout();
 return redirect('login');
}
}