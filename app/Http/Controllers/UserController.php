<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;


   
class UserController extends Controller
{
  
    public $name, $email, $password,$role;
   
    protected function rules()
    {
        return [
            'name' => 'required|ucfirst(name)',
            'email' => 'required|email',
            'password' => 'required|regex:"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$"',
            'role' => 'required'
            
        ];
    }
    public function index(Request $request)
    {
        $data = User::latest('id')->paginate(2);
        return view('users.index',compact('data'));
       
            
    }
    public function create()
    {
        return view('users.create');
    }
   
     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|regex:"^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$"',
            'role' => 'required'
            
        ],
        [
          'password' => 'Minimum 6 characters atleast 1 uppercase letter,1 lowercase letter, 1 number  &1specialcase',
        ]);
        $user= new User;
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index')->with('success','User has been created successfully.');
    }
   
}



