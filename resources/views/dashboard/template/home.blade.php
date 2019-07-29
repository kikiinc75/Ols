@extends('dashboard.template')
@section('content')
@section('dash-template','active')
<style>
    #table-data form { float: left  }
</style>
<section>
    <div class="mx-3">
        @if ( Session::has("success") )
            <div class="alert alert-success mt-2" role="alert">
                {{Session::get('success')}}
            </div>              
        @elseif ( Session::has("success") )
            <div class="alert alert-danger mt-2" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
                <h4>Compact Table</h4>
                <div class="mt-2">
                    <a href="{{url('template')}}" class="btn btn-success">New Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="table-data" class="table table-striped table-sm">            
                   <tr>
                        <th>Nama</th>
                        <th>Folder</th>
                        <th>Selected</th>
                        <th>Action</th>
                    </tr>
                    @foreach($template as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->folder}}</td>
                        <td>@if($data->selected == 1) 
                            <b>selected</b> 
                            @else 

                            @endif
                        </td>
                        <td>
                            <a href='{{url("dashboard/template/$data->id/select")}}'>
                            <button class="btn btn-success">select</button></a>
                        </td>
                    </tr>    
                    @endforeach
                </table>
                {{$template->links()}}
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection