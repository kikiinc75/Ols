@extends('dashboard.template')
@section('content')
@section('dash-vouchers','active')
<div class="row mt-3 mx-0">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Basic Form</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('vouchers.store')}}">
                    @csrf
                    <div class="form-group">
                        <label>Code</label>
                        <input type="text" name="code" placeholder="Code" class="form-control @error('code') bg-danger @enderror" id="code" value="{{old('code')}}">
                        @error("code")
							<div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" name="type" placeholder="Type" class="form-control @error('type') bg-danger @enderror" id="type" value="{{old('type')}}">
                        @error("content")
                            <div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Value</label>
                        <input type="text" name="value" placeholder="Value" class="form-control @error('value') bg-danger @enderror" id="value" value="{{old('value')}}">
                        @error("content")
                            <div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
               
                    <div class="form-group">       
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a href="{{route('vouchers.index')}}" class="btn btn-info">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection