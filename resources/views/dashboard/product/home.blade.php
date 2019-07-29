@extends('dashboard.template')
@section('content')
@section('dash-product','active')
<style>
    #table-data form { float: left  }
    .img 
        {
            max-width: 100px;
            height: auto;
        }
</style>
<section>
    <div class="mx-3">
        @if ( Session::has("success") )
            <div class="alert alert-success mt-2" role="alert">
                {{Session::get('success')}}
            </div>              
        @elseif ( Session::has("update"))
            <div class="alert alert-danger mt-2" role="alert">
                {{Session::get('update')}}
            </div>
         @elseif ( Session::has("delete") )
            <div class="alert alert-danger mt-2" role="alert">
                {{Session::get('delete')}}
            </div>
        @endif
        <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
                <h4>Compact Table</h4>
                <div class="mt-2">
                    <a href="{{route('product.create')}}" class="btn btn-success">New Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="table-data" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Varian</th>
                        <th>Stock</th>
                        <th>Categorie</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $data)
                    <tr>
                        <th scope="row">{{$data->code}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->varian}}</td>
                        <td>{{$data->stock}}</td>
                        <td>{{$data->categorie->name}}</td>
                        <td><img src="{{url('')}}/product/{{$data->image}}" class="img"></td>
                        <td>
                            <form action='{{route('product.destroy',$data->id)}}' method="POST">
                                @method("delete")
                                @csrf
                                <button class="btn btn-danger" onClick="return confirm('yakin ?')">delete</button>
                            </form>
                            
                            &nbsp 
                            <a href='{{route("product.edit","$data->id")}}'><button class="btn btn-success">Edit</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                {{$products->links()}}
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection