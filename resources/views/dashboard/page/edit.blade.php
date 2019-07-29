@extends('dashboard.template')
@section('content')
@section('dash-page','active')
<div class="row mt-3 mx-0">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Basic Form</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('page.update',$page->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" placeholder="Judul" class="form-control @error('judul') bg-danger @enderror" id="judul" value="{{$page->judul}}">
                        @error("judul")
							<div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <input type="text" name="content" placeholder="Content" class="form-control @error('content') bg-danger @enderror" id="content" value="@if(old('content')){{old('content')}}@else{{$page->content}}@endif">
                        @error("content")
							<div class="badge badge-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">       
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a href="{{route('page.index')}}" class="btn btn-info">Back</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection