@extends('dashboard.template')
@section('content')
@section('dash-categorie','active')
<div class="row mt-3 mx-0">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Basic Form</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('categorie.update',$categorie->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control @error('name') bg-danger @enderror" id="name" value="@if(old('name')){{old('name')}}@else{{$categorie->name}}@endif">
                        @error("name")
							<div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active" {{($categorie->status == 'active') ? 'selected' : ''}}>Active</option>
                            <option value="hide" {{($categorie->status == 'hide') ? 'selected' : ''}}>Hide</option>
                        </select>
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