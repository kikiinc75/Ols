<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sale;
use App\SaleItem;
use PDF;
use DB;
use Session;
use App\Notif;
use View;

class SaleController extends Controller
{
         public function __construct()
        {
          View::share('notif',Notif::where("status", 'unread'));      
        }
     	public function index()
     	{
     		$sale = Sale::paginate(5);
        	return view('dashboard.Sale.home',compact('sale'));
     	}

     	public function detail($id)
     	{
            $sale = Sale::find($id);
     		return view('dashboard.sale.detail',compact('sale'));

     	}

        public function edit($id)
        {
         $sale = Sale::find($id); 
         return view('dashboard.sale.edit',compact('sale'));
        }

        public function update(Request $request,$id)
    	{
            $this->validate($request,[
            'status' => 'required'
        ]);

            $sale = Sale::find($id); 
            $sale->status = $request->input("status");
            $sale->save();
            Session::flash('update','Data Berhasil Diupdate!!');
            return redirect()->to('/dashboard/sale');  
        }

     public function destroy(Request $request ,$id)
    {
        $sale = Sale::find($id);
        $sale->delete();
        $request->session()->flash('status', 'Data telah Di Hapus!');
        return back() ; 
    }

    public function print($id)
    {
        $sale = SaleItem::find($id);
        $pdf = PDF::localview('dashboard.sale.detail', compact('sale'));
        return $pdf->download('detail_laporan'. date('Y-m-d_H-i-s'). '.pdf');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
       $cari = $request->cari;
       $sale = Sale::where('nama','like',"%".$cari."%")
       ->orWhere('email','like',"%".$cari."%")
       ->orWhere('phone','like',"%".$cari."%")
       ->orWhere('alamat','like',"%".$cari."%")
       ->orWhere('status','like',"%".$cari."%")
       ->orWhere('bank','like',"%".$cari."%")->paginate(); 
       return view('dashboard.Sale.home',compact('sale'));
    }
     	
}
