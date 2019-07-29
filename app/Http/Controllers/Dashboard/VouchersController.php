<?php

namespace App\Http\Controllers\Dashboard;

use App\Vouchers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Notif;
use View;

class VouchersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        View::share('notif',Notif::where("status", 'unread'));
        $this->middleware('auth');
    }

    public function index()
    {
         $vouchers = Vouchers::paginate(5);
        return view('dashboard.vouchers.home',compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vouchers = Vouchers::all();
        return view("dashboard.vouchers.create",compact('vouchers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'code' => 'required',
            'type'=> 'required',
            'value'=> 'required'
           ]);
            
        $vouchers= new vouchers;
        $vouchers->code = $request->input("code");
        $vouchers->type = $request->input("type");
        $vouchers->value = $request->input("value");
        $vouchers->save();
        Session::flash("success","Data Berhasil Disimpan");
        return redirect()->route('vouchers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vouchers  $vouchers
     * @return \Illuminate\Http\Response
     */
    public function show(Vouchers $vouchers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vouchers  $vouchers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vouchers = Vouchers::find($id);
        return view('dashboard.vouchers.edit',compact('vouchers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vouchers  $vouchers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'code' => 'required',
            'type'=> 'required',
            'value'=> 'required'
           ]);
        
        $vouchers = Vouchers::find($id);   
        $vouchers->code = $request->input("code");
        $vouchers->type = $request->input("type");
        $vouchers->value = $request->input("value");
        $vouchers->save();
        Session::flash("update","Data Berhasil Diupdate");
        return redirect()->to('/dashboard/vouchers'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vouchers  $vouchers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $vouchers = Vouchers::find($id);
        $vouchers->delete();
        $request->session()->flash('delete', 'Data Berhasil Dihapus');
        return back() ; 
    }
}
