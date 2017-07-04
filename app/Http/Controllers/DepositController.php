<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function index()
    {
           $deposits = DB::table('deposit')
            //->get();
            ->paginate(5);

          return view('deposit.index', compact('deposits'));
        //return view("deposit.deposit");
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'balance' => 'required',
            'bankdeposit' => 'required',
            'accountnumberdeposit' => 'required',
            'accontnamedeposit' => 'required',
            'datetime' => 'required',
            'channeldeposit' => 'required',
            'tel' => 'required',
            'opinion' => 'required'
        ];

        $id = auth()->user()->id;

         $this->validate($request, $rules);
        //$inputs = request()->except(['_token']);
        $name = request('name');
        $balance = request('balance');
        $bankdeposit = request('bankdeposit');
        $accountnumberdeposit = request('accountnumberdeposit');
        $accontnamedeposit = request('accontnamedeposit');
        $datetime = request('datetime');
        $channeldeposit = request('channeldeposit');
        $tel = request('tel');
        $opinion = request('opinion');
        try {
        DB::table('deposit')
            ->insert([
                'user_id' => $id,
                'username' => $name,
                'balance' => $balance,
                'bankdeposit' => $bankdeposit,
                'accountnumberdeposit' => $accountnumberdeposit,
                'accontnamedeposit' => $accontnamedeposit,
                'datetime' => $datetime,
                'channeldeposit' => $channeldeposit,
                'tel' => $tel,
                'opinion' => $opinion
            ]);
        return redirect('/deposit');
        } catch (Exception $e) {
                abort(500);
        }
         //return $inputs;
    }
}
