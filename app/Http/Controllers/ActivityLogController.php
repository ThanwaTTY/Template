<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
         $ActivityLogs = ActivityLog::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);


    	return view('activity_log.index', compact('ActivityLogs') );
    }

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}   
}
