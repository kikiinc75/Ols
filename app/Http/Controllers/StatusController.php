<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use Auth;
use View; 
use App\Template;
use App\categorie;
use App\Product;
use App\SaleItem;
use Session;

class StatusController extends Controller
{
	public function __construct()
    {
         View::share('categorie',Categorie::all());
         View::share('product',Product::all());
         $this->template = Template::where("selected",'1')->first();;
         // $this->middleware('auth');
    }

    public function index()
    {
     if (Auth::check()) 
      {
      		$user = Auth::user();
          $sale = Sale::where('user_id',$user->id)->get();
            $price=0;
            if($sale)
            {
              foreach ($sale as $sl) 
              {
                foreach ($sl->saleItem as $item) 
                {
                  if($sale->count()>1)
                  {
                     $price+= $item->price*$item->qty;     
                  }else 
                  {
                    $price+= $item->price*$item->qty;
                  }
                }
              }
            }
        	return view('templates.'.$this->template->folder.'.status',compact('sale','price'));
      } 
      else 
      {
      	return redirect()->to('/login');
      }
    }

    public function upload(Request $request)
    {
        $sale = $request->input('id');
        $sale = Sale::where('id', $sale)->first();

        $path = $request->file('image')->move(public_path('bukti'),$sale->id.'.jpg');
        $sale->transfer = $sale->id.'.jpg' ;
        $sale->save() ; 
        
        return redirect()->to('/status');
    }

   public function hapus(Request $request , $id)
    {
       SaleItem::where('sale_id',$id)->delete();
       Sale::find($id)->delete();
       $request->session()->flash('status', 'Data telah Di Hapus!');
       return back() ; 
    }

      public function edit(Request $request, $id)
    {
        // $this->validate($request,[
        //     'code' => 'required|unique:products,code',
        //     'name' =>'required',
        //     'varian' => 'required',
        //     'stock' => 'required|integer',
        //     'price' => 'required|integer',
        //     'categorie_id' => 'required|integer'
        // ]);

            $sale = Sale::find($id); 
            $sale->nama = $request->input("nama");
            $sale->email = $request->input("email");
            $sale->phone = $request->input("phone");
            $sale->alamat = $request->input("alamat");
            $sale->save();
            Session::flash('update','Data Berhasil Diupdate!!');
            return back();
    }

     public function diterima(Request $request,$id)
      {
          
            $sale = Sale::find($id); 
            $sale->status = "Diterima";
            $sale->save();
            Session::flash('update','Data Berhasil Diupdate!!');
            return back();  
        }
   
}
