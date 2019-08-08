@extends('dashboard.template')
@section('content')
@section('dash-vouchers','active')
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
                <h4>Form Edit </h4>
            </div>
            <div class="card-body"></div>
            <form method="POST" action="{{route('vouchers.update',$vouchers->id)}}">
                @csrf
                @method('PUT')
               <div class="form-group">
                <label>Code</label>
                <input type="text" name="code" placeholder="Code" class="form-control @error('code') biru @enderror" id="code" value="{{$vouchers->code}}">
                </div>

                 <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" placeholder="Type" class="form-control @error('type') biru @enderror" id="type" value="{{$vouchers->type}}">
                </div>

                 <div class="form-group">
                <label>Value</label>
                <input type="text" name="value" placeholder="Value" class="form-control @error('value') biru @enderror" id="value" value="{{$vouchers->value}}">
                </div>
               
                <div class="form-group">       
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a href='{{url("dashboard/vouchers")}}' class="btn btn-info">Back</a>
                    </div>
                </form>
        </div>
    </div>
</div>         
@endsection