<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Withdraw;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = DB::table('withdraws')
            //->get();
            ->paginate(10);

        return view('withdraw.index', compact('withdraws'));
    }

     public function store(Request $request)
    {
        $rules = [
            'username' => 'required',
            'balance' => 'required',
            'bankwithdraw' => 'required',
            'accountnumberwithdraw' => 'required',
            'accountnamewithdraw' => 'required',
            'datetime' => 'required|date|after:start_date',
            'channelwithdraw' => 'required',
            'tel' => 'required',
            'opinion' => 'required'
        ];


        $this->validate($request, $rules);
        //$inputs = request()->except(['_token']);
        // $name = request('name');
        // $balance = request('balance');
        // $bankdeposit = request('bankdeposit');
        // $accountnumberdeposit = request('accountnumberdeposit');
        // $accontnamedeposit = request('accontnamedeposit');
        // $datetime = request('datetime');
        // $channeldeposit = request('channeldeposit');
        // $tel = request('tel');
        // $opinion = request('opinion');
        try {

            Withdraw::create([
                    'user_id' => auth()->user()->id, 
                    'username' => $request->username,
                    'balance' => $request->balance, 
                    'bankwithdraw' => $request->bankwithdraw, 
                    'accountnumberwithdraw' => $request->accountnumberwithdraw, 
                    'accountnamewithdraw' => $request->accountnamewithdraw,
                    'datetime' => $request->datetime, 
                    'channelwithdraw' => $request->channelwithdraw, 
                    'tel' => $request->tel, 
                    'opinion' => $request->opinion
                        ]);
                    return redirect('/deposit');
            } catch (Exception $e) {
                    abort(500);
            }
    }
}
