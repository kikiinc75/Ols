<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Categorie;
use Session;
use View;
use App\Notif;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         View::share('notif',Notif::where("status", 'unread'));;
         $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy("id","DESC")->paginate(10);
        return view("dashboard.product.home",compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view("dashboard.product.create",compact('categories'));
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
            'code' => 'required|unique:products,code',
            'name' =>'required',
            'varian' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'categorie_id' => 'required|integer'
        ]);

        $product = new Product;
        $product->code = $request->input("code");
        $product->name = $request->input("name");
        $product->varian = $request->input("varian");
        $product->stock = $request->input("stock");
        $product->price = $request->input("price");
        $product->categorie_id = $request->input("categorie_id");
        $product->save();

         //upload file to storage
        $path = $request->file('image')->move(public_path('product'),$product->id .'.jpg');

        $product->image = $product->id .'.jpg' ;
        $product->save() ; 

        Session::flash('success','Data Berhasil Disimpan!!');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Categorie::all();
        return view('dashboard.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'code' => 'required|unique:products,code',
            'name' =>'required',
            'varian' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'categorie_id' => 'required|integer'
        ]);
        
        $product->code = $request->input("code");
        $product->name = $request->input("name");
        $product->varian = $request->input("varian");
        $product->stock = $request->input("stock");
        $product->price = $request->input("price");
        $product->categorie_id = $request->input("categorie_id");
        $product->save();

        Session::flash('update','Data Berhasil Diupdate!!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Session::flash('delete','Data Berhasil Diupdate!!');
        return back() ; 
    }
}
