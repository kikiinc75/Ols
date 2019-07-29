@extends('templates.template_sela.master')
@section('content')
    <!-- Start Banner Area -->
    <style>
       .table 
       {
            padding-top: 150px;
       } 
       .warna
       {
        background-color: orange;
        color: white;
        padding: 10px;
       }
    </style>
            
    <div class="row">
    <div class="col-lg-12">
    </div>
</div>
<div class="table">
<div class="row text-center">
    <div class="col-lg-12">
    <div class="container">
            <table class="table table-bordered">
             @if($cart->count()>0)   
                <tr>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Nama Product</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">Remove</th>
                </tr>
               @else
                    Cart Anda Kosong!
                @endif
                </div>
                 @if($cart->count()>0)   
                    @foreach ($cart as $data)  
                    <tr>
                        <td class="text-left"><img class="img-fluid" width="150px" src="{{url('')}}/product/{{$data->image}} "></a></td>
                        <td class="text-left">
                               {{$data->product->name}}
                        </td>
                        <form action="{{url('/cart/ubahqty')}}" method="POST">
                        @csrf
                        <td class="text-center">
                            <input type="number" min="1" max="60" name="qty" value="{{$data->qty}}" class="form-control-md"> <br>
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <input type="submit" class="btn  btn-primary btn-xs form-control-md mt-3" value="update">
                            @error('qty')
                            <div class="">{{$message}}</div>
                            @enderror
                            @error('id')
                            <div class="">{{$message}}</div>
                            @enderror
                        </td>

                        <td class="text-right">
                        Rp. {{number_format($data->product->price)}}
                        </td>
                        <td class="text-right">
                            @php
                             $total= $data->qty * $data->product->price;
                            @endphp

                            Rp. {{number_format($total,0)}},-
                        </td>
                        </form>
                        <td class="text-right">
                            <a href='{{url("/cart/$data->id/destroy")}}' class="btn btn-danger btn-xs" onClick="return confirm('yakin ?')>
                                <span class="glyphicon glyphicon-trash"></span>
                                Delete
                            </a>
                    </tr>  
                     </td>
                    @endforeach
                <tr>
                    <th class="text-left"></th>
                    <th class="text-right"></th>
                    <th class="text-right"></th>
                    <th class="text-right">TOTAL:</th>
                    <th class="text-right"><strong>Rp. {{number_format($totals->total)}}</strong></th>
                    <th class="text-right"></th>
                </tr>   
                @endif
                @if (Session::has('success'))
                 <div class="warna">
                 {{Session::get('success')}} 
                 </div>
                @endif      
                <!-- <tr>
                     <th class="text-right" colspan="2">
                        <button type="submit" name="update" class="btn btn-xs btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span> Update All Quantity
                        </button>
                    </th>
                    <th class="text-right" colspan="3">
                        <a href="" class="btn btn-warning btn-xs">
                            <span class="glyphicon glyphicon-chevron-left"></span> Back to Shop
                        </a>
                        <a href="" class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-trash"></span> Remove All Data
                        </a>
                        <a href="" class="btn btn-success btn-xs">
                            Checkout <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </th>
                </tr> -->
            </table>
             
             @if($cart->count()>0)    
              <div class="mit-2">
                    <a href='{{url("/cart/data")}}' class="btn btn-success mt-bottom-3">Tahap Selanjutnya</a>
             </div>
             @else

             @endif
    </div>
    </div>
</div>
    <!--================End Cart Area =================-->
@endsection