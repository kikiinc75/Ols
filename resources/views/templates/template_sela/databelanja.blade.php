@extends('templates.template_sela.master')
@section('content')
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

<div class="table">
  <div class="container">
    <div class="col-lg-12">
    <form method="POST" action="{{url('/databelanja/tambahdatabelanja')}}">
    <h3>Isi Data</h3>
    <hr>
                    @csrf
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" placeholder="nama" class="form-control @error('nama') bg-danger @enderror" id="nama" value="{{old('nama')}}">
                        @error("nama")
                            <div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="email" class="form-control @error('email') bg-danger @enderror" id="content" value="{{old('email')}}">
                        @error("email")
                            <div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" name="phone" placeholder="Phone" class="form-control @error('phone') bg-danger @enderror" id="phone" value="{{old('phone')}}">
                        @error("phone")
                            <div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" placeholder="Alamat" class="form-control @error('alamat') bg-danger @enderror" id="alamat" value="{{old('alamat')}}">
                        @error("alamat")
                            <div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>  
                    <div class="form-group">
                        <label>Pilih Bank:</label>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="bank" name="bank" value="bni">
                          <label class="form-check-label" for="materialChecked2"><img src="{{asset('image/bni.png')}}" width="50 px"><br><strong>98734-3443-3456</strong></label>
                        </div>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="bank" name="bank" value="bca">
                      <label class="form-check-label" for="materialChecked2"><img src="{{asset('image/bca.jpg')}}" width="50 px"><br><strong>345678-4456-2345</strong></label>
                    </div>
                    @error("bank")
                            <div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div> 
                    <div class="form-group">       
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a href="{{url('cart')}}" class="btn btn-info">Back</a>
                    </div>
                </form>

                @if (Session::has('success'))
                 <div class="warna">
                 {{Session::get('success')}} 
                 </div>
                @endif  
    
    </div>
 	</div>
 </div>
</div>
 @endsection