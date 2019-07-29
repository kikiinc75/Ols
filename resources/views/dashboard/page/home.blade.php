@extends('dashboard.template')
@section('content')
@section('dash-page','active')
<style>
    #table-data form { float: left  }
</style>
<section>
    <div class="mx-3">
        @if ( Session::has("success") )
            <div class="alert alert-success mt-2" role="alert">
                {{Session::get('success')}}
            </div>              
        @elseif ( Session::has("update") )
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
                    <a href="{{route('page.create')}}" class="btn btn-success">New Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="table-data" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($page as $data)
                    <tr>
                        <td>{{$data->judul}}</td>
                        <td>{{$data->content}}</td>
                        <td>
                            <form action='{{route("page.destroy",$data->id)}}' method="POST">
                                @method("delete")
                                @csrf
                                <button class="btn btn-danger" onClick="return confirm('yakin ?')">delete</button>
                            </form>
                            
                            &nbsp 
                            <a href='{{route("page.edit",$data->id)}}'><button class="btn btn-success">Edit</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                {{$page->links()}}
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection