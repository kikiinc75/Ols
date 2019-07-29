<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie ; 
use View ; 
use App\Template ; 
use App\Product ; 
use App\Page ; 
use Auth;
use App\Wishlish;
use Session;

class WishlishController extends Controller
{
     public function __construct()
    {
        View::share('categorie',Categorie::all());
        View::share('product',Product::all());
        $this->template = Template::where("selected",'1')->first();
        $this->middleware('auth');
    }

    public function index()
    {
      $user = Auth::user();
      $wishlist = Wishlish::where("user_id", "=", $user->id)->orderby('id', 'desc');

    }

    public function store($id)
    {
      $user = Auth::user();

      $wishlist = new Wishlish;

      $wishlist->user_id = $user->id;
      $wishlist->product_id = $id;
      $wishlist->save();
      Session::flash('wishlist','Data success!!');
      return back();
  	}

      

}
