<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notif;
use Session;
use View;
class DashboardController extends Controller
{
    public function __construct(){
        View::share('notif',Notif::where("status", 'unread'))->get();
        $this->middleware('auth');
    }

    public function index()
    {

        return view('dashboard.index');
    }

    public function notifpage(){
        $readall = Notif::all();
        return view('dashboard.readpage',compact('readall'));
    }

    public function readall()
    {
        $update = Notif::where("status","unread")->first();
        $update->status="read";
        $update->save();

        Session::flash('succes','Data success!!');
        return back();       
    }
}
