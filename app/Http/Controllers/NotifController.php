<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notif;  
use Auth;

class NotifController extends Controller
{
    public function notif()
    {
    	$notif = Notif::all();
        return view("dashboard/home",compact('notif'));
    }
}
