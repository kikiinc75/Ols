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
        <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
                <h4>Notification</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="table-data" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Alamat</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($readall as $data)
                    <tr>
                   
                        <td>{{$data->id}}</td>
                        <td>{{$data->sale->nama}}</td>
                        <td>{{$data->sale->email}}</td>
                        <td>{{$data->sale->phone}}</td>
                        <td>{{$data->sale->alamat}}</td>
                        @endforeach
                    </tr> 
                </tbody>
                </table>
              
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection