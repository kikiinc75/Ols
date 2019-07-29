<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Users;
use App\Cart;
use View; 
use App\Template;
use App\categorie;
use Session;
use App\Sale;
use App\SaleItem;
use App\Notif;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
         View::share('categorie',Categorie::all());
         View::share('product',Product::all());
         $this->template = Template::where("selected",'1')->first();;
         $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $cart = cart::all();
        $totals = Cart::where('user_id', $user->id)->selectRaw('Sum((price * qty)) AS total')->first();
        return view('templates.'.$this->template->folder.'.cart',compact('cart','totals','user'));
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request) //localhost/product/1/store
   {


      if (Auth::check()) 
      {
          $product = $request->input('id');
          $product_id = Product::find($product);
          $cek = Cart::where('product_id',$product)->first();
          if ($cek)
          {
             $cek->qty = $cek->qty+1;
             $cek->save();

             $product_id->stock = $product_id->stock - 1;
             $product_id->save();

             Session::flash('cart','Data success!!');
             return back();
          }
          else
          {  
             $product_id = Product::find($product);
             $user = Auth::user();
             $cart = new Cart;
             $cart->user_id = $user->id;
             $cart->product_id = $product;
             $cart->qty = 1;
             $cart->image = $product_id->image;
             $cart->price = $product_id->price;
             $cart->save();
             $product_id->stock = $product_id->stock - 1;
             $product_id->save();
             
             return back();
          }
      }
      else
      {
        return redirect()->to('/login'); 
      }

   }


   public function ubahqty(Request $request)
   {
       $this->validate($request,[
            'qty' => 'required|integer',
            'id' => 'required|integer'
        ]);

        $id= $request->input('id');
        $cart = Cart::find($id);
        $cart->qty = $request->input("qty");
        $cart->save();
      // perintah success 
        return back();
   }

   public function destroy($id)
   {
        $cart = Cart::find($id);
        $cart->delete();
        Session::flash('success','Data success to delete!!');
        return back();
   }

   public function data()
   {
       return view('templates.'.$this->template->folder.'.databelanja');

   }

   public function tambahdatabelanja(Request $request)
   {
      $this->validate($request,[
            'nama' =>'required|string|max:30',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'alamat' => 'required',
            'bank' => 'required'
        ]);

       

        $belanja = new Sale;
        $user = Auth::user();
      
        $belanja->user_id = $user->id;
        $belanja->nama = $request->input("nama");
        $belanja->email = $request->input("email");
        $belanja->phone = $request->input("phone");
        $belanja->alamat = $request->input("alamat");
        $belanja->bank = $request->input("bank");
        $belanja->save();

        $user = Auth::user();
        $cart = Cart::where('user_id',$user->id)->get();
        $arr = array(); 

       foreach ( $cart as $row )
        {

          $arr[] = array(
            'product_id'=>$row->id,
            'sale_id'=>$belanja->id ,
            'qty' =>$row->qty , 
            'price' => $row->price,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            
          );
        }

           SaleItem::insert($arr);  
           $cart = Cart::where('user_id',$user->id)->delete();

           $user = Auth::user();
           $sale = Sale::where('user_id', $user->id)->first();
           $notif = New Notif;
           $notif->user_id = $user->id;
           $notif->sale_id = $sale->id;
           $notif->status = "unread"; 
           $notif->save();
           Session::flash('success','Data success!!');
           return redirect()->to("/cart/data/terimakasih");
        
   }

   public function dataterimakasih()
   {
       return view('templates.'.$this->template->folder.'.terimakasih');

   }

}


// $nama = "dodi"; 

// $var = "nama adalah !$nama prakoso"; //nama adalah !dodi
// $var = "nama adalah ".$nama." prakoso" ; // nama adalah dodi
// $var = 'nama adalah $nama'; // nama adalah $nama
