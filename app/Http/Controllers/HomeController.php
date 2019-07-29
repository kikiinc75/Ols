<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie ; 
use View ; 
use App\Template ; 
use App\Product ; 
use App\Page ; 
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        View::share('categorie',Categorie::all());
        View::share('product',Product::all());
        //$this->middleware('auth');
        $this->template = Template::where("selected",'1')->first();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        return view('templates.'.$this->template->folder.'.index');
    }
    public function page($id){
        return view('templates.'.$this->template->folder.'.page');
    }

    public function product(Request $request){

        $categorie_id = $request->input('categorie');

        $product= Product::where("level","parent")->orderBy('id', 'desc');

            if ($categorie_id > 0)
        {
            $product = $product->where("categorie_id",$categorie_id);
        }

        $product = $product->paginate(9);

        return view('templates.'.$this->template->folder.'.product', compact('product'));
    }

    public function detail($id){
        $detail = Product::find($id) ;
        return view('templates.'.$this->template->folder.'.detail',compact('detail'));
    }

    public function contact(){
        return view('templates.'.$this->template->folder.'.contact');
    }

     public function aboutus(){
        return view('templates.'.$this->template->folder.'.aboutus');
    }

    // public function cart(){
    //     return view('templates.'.$this->template->folder.'.cart');
    // }
}
