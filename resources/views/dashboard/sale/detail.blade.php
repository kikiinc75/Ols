@extends('dashboard.template')
@section('content')
@section('dash-sale','active')
<style>
    .biru 
    {
        background-color: blue;
    }
    
</style>
<div class="row mt-3 mx-0">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
            <h2>Detail</h2>
            </div>
              <table>
                        <tr><td colspan="2"><h2>Alamat kirim</h2></td></tr>
                        <tr><td>Nama   :</td><td>{{$sale->nama}}</td></tr>
                        <tr><td>Email  :</td><td>{{$sale->email}}</td></tr>
                        <tr><td>Phone  :</td><td>{{$sale->phone}}</td></tr>
                        <tr><td>Alamat :</td><td>{{$sale->alamat}}</td></tr>
             </table>
             <br>
             <hr>
            <table id="table-data" class="table table-striped table-sm">
                    <tr>
                        <th>Code</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr> 
                    <tr>
                        @foreach ($sale->saleitem as $data)
                        <td>{{$data->product->code}}</td> 
                        <td>{{$data->product->name}}</td> 
                        <td>{{$data->qty}}</td>
                        <td>{{$data->product->price}}</td> 
                         <td>
                                @php 
                                    $total = $data->qty * $data->product->price; 
                                    $totalAll = !isset($totalAll) ? $totalAll = $total : $total + $totalAll ;
                                @endphp
                                Rp. {{number_format($total,0)}} ,-
                            </td>  
                    </tr>
                    @endforeach
                     <tr>
                            <td colspan="4" align="right">Total</td>
                            <td>Rp. {{number_format($totalAll,0)}} ,-</td>
                        </tr>
                    </thead>

                     </table>

        <div class="form-group">       
            <a href='{{url("dashboard/sale")}}' class="btn btn-info">Back</a>
            <a href='{{url("dashboard/sale/$sale->id/print")}}' class="btn btn-primary">Print</a>
        </div>
               
            
        </div>
    </div>
</div>         
@endsection