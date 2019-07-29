<?php

namespace App\Http\Controllers\Dashboard;

use App\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User; 
use Session;
use App\Notif;
use DB; 
use View;

class TemplateController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         View::share('notif',Notif::where("status", 'unread'));
         $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $template = Template::paginate(5);
        return view('dashboard.template.home',compact('template'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function select($id)
    {
        //Tahap 1 merubah kolom selected dengan nilai 1 menjadi nilai 0
        // $template = DB::table('templates')
        //             ->where('selected', '1' )
        //             ->update(['selected' => '0']);
        

        $template = Template::where("selected", '1')->first();
        $template->selected = '0';
        $template->save();

                
        //Tahap 2 merubah yang terpilih , kolom selected menjadi 1        
        $template = Template::where("id",$id)->first(); 
        $template->selected = '1';
        $template->save(); 
                

        Session::flash("success","berhasil merubah template"); 
        return back();
    }

}
