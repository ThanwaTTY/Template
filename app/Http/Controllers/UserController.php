<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ActivityLog;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            //->get();
            ->paginate(5);

        return view('user.index', compact('users'));
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

                ActivityLog::create([
                    'user_id' => auth()->user()->id,
                    'message' => 'Add New User ',
                    'detail'  => 'Username :'.$request->name.' / Email :'.$request->email.' / Password :'.$request->password
                ]);
                return redirect('/user');
                // return "รหัสผ่านตรงกัน";
                }else{return "รหัสผ่านไม่ตรงกัน";}
   
    }

    public function edit($id)
    {    
    $users = DB::table('users')
        ->where('id', $id)
        ->first();

        return view('user.edit', compact('users'));
        //return view('user.edit');
    }

     public function update(Request $request, $id)
    {
        

        $name = request('name');
        $email = request('email');
        $password = bcrypt(request('password'));
        $Cpassword = request('password');
        $cretype_password = request('retype_password');
        $retype_password = bcrypt(request('retype_password'));


                if($Cpassword==$cretype_password)
                    {
                        DB::table('users')
                        ->where('id',$id)
                        ->update([
                            'name' => $name,
                            'email' => $email,
                            'password' => $password
                        ]);
                        return redirect('/user');
                        //return "รหัสผ่านตรงกัน";
                    }
                else
                    {
                        return "รหัสผ่านไม่ตรงกัน";
                    }
                // return $id;
                // return "UPdate";

        // $this->validate($request, $this->rules);
        // try{
        //     DB::table('employees')
        //         ->where('id',$id)
        //         ->update($inputs);
        // } catch (Exception $e) {
        //     abort(500);
        // }
        // return redirect('/employees/'.$id);
    }

        public function destroy($id)
    {
        try {
            DB::table('users')
                ->where('id',$id)
                ->delete();

            session()->flash('massage', 'Delete Success');

            return redirect('/user');
        } catch (Exception $e) {
            abort(500);
        }
        //return "destroy";
    }
}
