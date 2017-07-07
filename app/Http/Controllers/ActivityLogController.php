<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActivityLog;

class ActivityLogController extends Controller
{
    public function index()
    {
        $ActivityLogs = ActivityLog::paginate(10);

    	return view('activity_log.index', compact('ActivityLogs') );
    }

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}   
}
