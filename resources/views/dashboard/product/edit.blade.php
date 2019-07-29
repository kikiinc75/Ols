@extends('dashboard.template')
@section('content')
@section('dash-product','active')
<div class="row mt-3 mx-0">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Basic Form</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('product.update',$product->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" name="code" placeholder="Code" class="form-control @error('name') bg-danger @enderror" id="code" value="{{$product->code}}" readonly>
                        @error("code")
							<div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control @error('name') bg-danger @enderror" id="name" value="@if(old('name')){{old('name')}}@else{{$product->name}}@endif">
                        @error("name")
							<div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Varian</label>
                        <input type="text" name="varian" placeholder="Varian" class="form-control @error('name') bg-danger @enderror" id="varian" value="@if(old('varian')){{old('varian')}}@else{{$product->varian}}@endif">
                        @error("varian")
							<div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="text" name="stock" placeholder="Stock" class="form-control @error('name') bg-danger @enderror" id="stock" value="@if(old('stock')){{old('stock')}}@else{{$product->stock}}@endif">
                        @error("stock")
							<div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" placeholder="Price" class="form-control @error('name') bg-danger @enderror" id="price" value="@if(old('price')){{old('price')}}@else{{$product->price}}@endif">
                        @error("price")
							<div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Categorie</label>
                        <select name="categorie_id" id="categorie_id" class="form-control">
                            <option value="">-- silahkan pilih --</option>
                            @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}" @if($product->categorie_id == $categorie->id) selected @endif>{{$categorie->name}}</option>
                            @endforeach
                        </select>

                        @error("categorie_id")
                            <div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">       
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a href="{{route('product.index')}}" class="btn btn-info">Back</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection