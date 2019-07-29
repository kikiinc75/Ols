<?php

namespace App\Http\Controllers\Dashboard;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use App\Notif;
class PageController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::paginate(5);
        return view('dashboard.page.home',compact('page'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create() 
    {
        $page = Page::all();
        return view("dashboard.page.create",compact('page'));
    }

    public function store(Request $request)
    {
            $this->validate($request,[
            'judul' => 'required',
            'content'=> 'required'
           ]);
            
        $page= new page;
        $page->judul = $request->input("judul");
        $page->content = $request->input("content");
        $page->save();
        Session::flash('success','Data berhasil disimpan!!');
        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('dashboard.page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request,[
            'judul' => 'required',
            'content'=> 'required'
           ]);
        
        $page->judul = $request->input("judul");
        $page->content = $request->input("content");
        $page->save();
        Session::flash('update','Data berhasil diupdate!!');
        return redirect()->route('page.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        Session::flash('delete','Data berhasil dihapus!!');
        return back() ; 
    }
}
