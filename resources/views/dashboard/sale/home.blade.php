@extends('dashboard.template')
@section('content')
@section('dash-sale','active')
<style>
    #table-data form { float: left  }
</style>
<section>
    <div class="mx-3">
        @if ( Session::has("update") )
            <div class="alert alert-success mt-2" role="alert">
                {{Session::get('update')}}
            </div>              
        @endif
        <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
                <h4>Compact Table</h4>
            </div>
            {{Session::get('status')}}
            <div class="card-body">
                <div class="table-responsive">
                <form action='{{url("dashboard/sale/cari")}}' method="POST">
                 @csrf
                    <input type="text" name="cari" placeholder="" value="">
                    <input type="submit" value="Pencarian">
                </form>
                <br>
                <table id="table-data" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Bank</th>
                        <th>Bukti Transfer</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sale as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->alamat}}</td>
                        <td>{{$data->status}}</td>
                        <td>{{$data->bank}}</td>
                        <td>
                        @if($data->transfer == null)
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal{{$data->id}}"> Lihat Bukti</button>
                        @else
                         <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$data->id}}"> Lihat Bukti</button>
                        @endif
                            <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Bukti Transfer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  @if($data->transfer == null)
                                   Kosong!
                                   @else
                                  <div class="modal-body">
                                    <img src="{{asset('bukti')}}/{{$data->transfer}}" width="450">
                                  </div>
                                  @endif
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </td>
                        <td>
                            <a href='{{url("dashboard/sale/$data->id/destroy")}}'>
                                <button class="btn btn-danger btn-sm" onClick="return confirm('yakin ?')">Delete</button></a>
                         

                             <a href='{{url("dashboard/sale/$data->id/detail")}}'><button class="btn btn-success btn-sm">Detail</button></a>

                            <a href='{{url("dashboard/sale/$data->id/edit")}}'><button class="btn btn-success btn-sm" class="">Edit</button></a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                {{$sale->links()}}
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection