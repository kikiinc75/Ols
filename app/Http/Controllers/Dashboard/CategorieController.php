<?php

namespace App\Http\Controllers\Dashboard;

use App\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Notif;
use View;

class CategorieController extends Controller
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
        $categories = Categorie::paginate(5);
        return view('dashboard.categorie.home',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categorie.create');
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
            'name' => 'required',
        ]);

        $categorie = new Categorie;
        $categorie->name =$request->input("name");
        $categorie->save();

        Session::flash('success','Data berhasil disimpan!!');
        return redirect()->route('categorie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        return view('dashboard.categorie.edit',compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);

        $categorie->name =$request->input("name");
        $categorie->status = $request->input("status");
        $categorie->save();

        Session::flash('update','Data berhasil diupdate!!');
        return redirect()->route('categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        Session::flash("delete","Data berhasil dihapus!!"); 
        return back() ; 
    }
}
