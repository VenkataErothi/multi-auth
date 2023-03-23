<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Hash;
use Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\AdminAuthenticated;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     protected $redirectTo = '/home';
/*
    protected $redirectTo = RouteServiceProvider::HOME;*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
   {
            $request->validate([
            'email' => 'required|email',
            'password' => 'required|regex:"^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$"',
      ],
      [
        'password' => 'Minimum 6 characters atleast 1 uppercase letter,1 lowercase letter, 1 number  &1specialcase',
      ]);
       if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
            if (Auth()->user()->role == 'admin') { 
               return redirect(route('admin.home'))->with('success','you are logged in successfully');
            }
            elseif (Auth()->user()->role == 'user') {   
                   return redirect(route('user.home'));
            }
            elseif (Auth()->user()->role == 'nonadmin') { 
                   return redirect(route('nonadmin.home'));
            }
            else {
                 return redirect('login')->withErrors(['failed'=>"Invalid Username/Password"]); 
            }    
        }
       else {
            return redirect('login')->withErrors(['failed'=>"Invalid Username/Password"]); 
           }      
    }
    public function logout()
   {
        Session::flush();
        Auth::logout();
        return redirect('login');
   }
}

