<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class WithdrawController extends Controller
{
    public function index()
    {
        $withdraws = DB::table('withdraw')
            //->get();
            ->paginate(10);

        return view('withdraw.index', compact('withdraws'));
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

        //$this->validate($request, $rules);
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
        // DB::table('deposit')
        //     ->insert([
        //         'user_id' => $id,
        //         'username' => $name,
        //         'balance' => $balance,
        //         'bankdeposit' => $bankdeposit,
        //         'accountnumberdeposit' => $accountnumberdeposit,
        //         'accontnamedeposit' => $accontnamedeposit,
        //         'datetime' => $datetime,
        //         'channeldeposit' => $channeldeposit,
        //         'tel' => $tel,
        //         'opinion' => $opinion
        //     ]);
        //return redirect('/deposit');
        $date = date( 'y-m-d H:m:s' );
        return $date;
        } catch (Exception $e) {
                abort(500);
        }
    }
}
