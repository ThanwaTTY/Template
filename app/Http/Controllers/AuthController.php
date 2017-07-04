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
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'retype_password' => 'required'
        ];
                $name = request('name');
                $email = request('email');
                $password = bcrypt(request('password'));
                $Cpassword = request('password');
                $cretype_password = request('retype_password');
                $retype_password = bcrypt(request('retype_password'));

                $this->validate($request, $rules);

                // try {
                //  DB::table('users')->insert([
                //     'name' => $name,
                //     'email' => $email,
                //     'password' => $password
                // ]);
                // return redirect('/');
                // } catch (Exception $e) {
                //         //abort(500);
                //         return "E-mail";
                // }
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

    public function postLogin(Request $request){

        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $inputs = request()->except(['_token']);
        $this->validate($request, $rules);

        //$inputs = request()->only(['create','edit']);
        // $inputs->users()->fill([
        //     'username' => $username,
        //     'password' => Hash::make($password),
        //     'name' => $name,
        //     'status' => $status
        // ])->save();

        // try{
        //     session()->flash('massage', 'Login Success');
        //     //return "Check Validator";
        // } catch (Exception $e) {
        //     session()->flash('massage', 'Login Fail');
        //     //return "UnCheck Validator";
        // }
        // return redirect('/employees/'.$id);
        

        if(auth()->attempt($inputs)) {
            session()->flash('massage', 'Login Success');
             return redirect()->intended('/');
             //return 'AAAAAAA';
        } else {
              //abort(401);
            session()->flash('massage', 'E-mail or Password not Correct');
            return redirect('/login');
        }
        //return redirect()->intended('/');
    }

    public function logout(){
            auth()->logout();
        return redirect('/login');
    }  
}
