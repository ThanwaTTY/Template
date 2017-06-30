<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return 'Index';
    }
    // public function register()
    // {
    //     return "Register";
    // }
    public function getlogin(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function store(Request $request)
    {
        // $rules = [
        //     'username' => 'required',
        //     'Email' => 'required',
        //     'Password' => 'required',
        //     'Retype_Password' => 'required'
        // ];
                $name = request('name');
                $email = request('email');
                $password = bcrypt(request('password'));
                $Cpassword = request('password');
                $cretype_password = request('retype_password');
                $retype_password = bcrypt(request('retype_password'));

                // $this->validate($request, $rules);

                if($Cpassword==$cretype_password){
                 DB::table('users')->insert([
                    'name' => $name,
                    'email' => $email,
                    'password' => $password
                ]);
                return redirect('/');
                // return "รหัสผ่านตรงกัน";
                }else{return "รหัสผ่านไม่ตรงกัน";}

        //     $users = DB::table('users')
        //     ->get();
            // ->paginate(5);
         //return view('index', compact('users'));
        //  return redirect('/');
        //return 'STORE';
            
    }

    public function postLogin(){
        $inputs = request()->except(['_token']);

        //$inputs = request()->only(['create','edit']);
        // $inputs->users()->fill([
        //     'username' => $username,
        //     'password' => Hash::make($password),
        //     'name' => $name,
        //     'status' => $status
        // ])->save();
        

        if(auth()->attempt($inputs)) {
             return redirect()->intended('/');
             //return 'AAAAAAA';
        } else {
            //  abort(401);
            return redirect('/');
        }
    }

    public function logout(){
            auth()->logout();
        return redirect('/login');
    }  
}
