@extends('dashboard.template')
@section('content')
@section('dash-vouchers','active')
<style>
    #table-data form { float: left  }
</style>
<section>
    <div class="mx-3">
        @if ( Session::has("success"))
            <div class="alert alert-success mt-2" role="alert">
                {{Session::get('success')}}
            </div>              
        @elseif ( Session::has("update"))
            <div class="alert alert-danger mt-2" role="alert">
                {{Session::get('update')}}
            </div>
        @elseif ( Session::has("delete"))
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
                    <a href="{{route('vouchers.create')}}" class="btn btn-success">New Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="table-data" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vouchers as $data)
                    <tr>
                        <td>{{$data->code}}</td>
                        <td>{{$data->type}}</td>
                        <td>{{$data->value}}</td>
                        <td>
                            <form action='{{route("vouchers.destroy",$data->id)}}' method="POST">
                                @method("delete")
                                @csrf
                                <button class="btn btn-danger" onClick="return confirm('yakin ?')">delete</button>
                            </form>
                            
                            &nbsp 
                            <a href='{{url("dashboard/vouchers/$data->id/edit")}}'><button class="btn btn-success">Edit</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                {{$vouchers->links()}}
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection