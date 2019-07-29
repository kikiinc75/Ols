<!-- Start exclusive deal Area -->
@extends('templates.template_sela.master')
@section('content')
	

	<section class="checkout_area section_gap pb-5">
  @if ( Session::has("update") )
            <div class="alert alert-success mt-2" role="alert">
                {{Session::get('update')}}
            </div>              
  @endif
 <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-header">
                <h4>Status Pembelian</h4>
            </div>
            {{Session::get('status')}}
            <div class="card-body">
                <div class="table-responsive">
                <table id="table-data" class="table table-striped table-sm">
                    <thead>
                    <tr>
                    	  <th>No</th>
                        <th>Tanggal Order</th>
                        <th>Action</th>
                        <th>Bukti Transfer</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($sale as $data)
                    <tr>
                    	<td>{{$data->id}}</td>
                       <td>{{$data->created_at}}</td>
                         <td>
                          @if($data->status == "terkirim")
                          <form method="POST" action='{{url("status/$data->id/diterima")}}'> 
                          @csrf
                          @method('PATCH')   
                          <button class="btn btn-primary btn-sm" onClick="return confirm('Apakah Anda Sudah Menerima Barang?')">Menerima Barang</button></a> 
                          </form>
 

                            @elseif($data->status == "tidakterkirim")
                            <a href='{{url("status/$data->id/hapus")}}'>
                                <button class="btn btn-danger btn-sm" 
                                onClick="return confirm('Apakah Kamu Yakin Ingin Menghapus Pesanan Anda?')">Delete</button></a>  

                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal{{$data->id}}"> Detail</button>

                            <div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Data Customer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="POST" action='{{url("status/$data->id/edit")}}'>
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                         <label>Nama</label>
                                          <input type="text" name="nama" class="form-control @error('nama') bg-danger @enderror" id="nama" value="{{$data->nama}}">
                                          @error("nama")
                                          <div class="badge badge-danger">{{$message}}</div>
                                          @enderror
                                    </div>

                                    <div class="form-group">
                                         <label>Email</label>
                                          <input type="text" name="email" class="form-control @error('email') bg-danger @enderror" id="email" value="{{$data->email}}">
                                          @error("code")
                                          <div class="badge badge-danger">{{$message}}</div>
                                          @enderror
                                    </div>

                                    <div class="form-group">
                                         <label>Phone</label>
                                          <input type="number" name="phone" class="form-control @error('phone') bg-danger @enderror" id="phone" value="{{$data->phone}}">
                                          @error("phone")
                                          <div class="badge badge-danger">{{$message}}</div>
                                          @enderror
                                    </div>

                                     <div class="form-group">
                                         <label>Alamat</label>
                                          <input type="text" name="alamat" class="form-control @error('alamat') bg-danger @enderror" id="alamat" value="{{$data->alamat}}">
                                          @error("alamat")
                                          <div class="badge badge-danger">{{$message}}</div>
                                          @enderror
                                    </div>

                                     <div class="form-group">
                                         <label>Transfer Bank</label>
                                         @if($data->bank == 'bni')
                                         <h5>{{$data->bank}}</h5>
                                          <input type="text" name="bank" class="form-control @enderror" id="bank" value="98734-3443-3456" readonly>
                                          @elseif ($data->bank == 'bca') 
                                          <input type="text" name="bank" class="form-control bg-danger"  id="bank" value="345678-4456-2345" readonly>
                                          @endif
                                    </div>

                                    <div class="form-group">
                                         <label>Total</label> 
                                          <input type="text" name="bank" class="form-control"  value="Rp. {{number_format($price,0)}}" readonly>
                                    </div>

                               <div class="form-group">       
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                        <a href='{{url("status")}}' class="btn btn-info">Back</a>
                                    </div>
                                </form>
                                  </div>
                                  <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div> -->
                                </div>
                              </div>
                          </div>

                        </td>
                        <td>
                  @if($data->status == "terkirim")
                   
                  @elseif($data->status == "tidakterkirim")
									<form action="{{url('/status/upload')}}" method="post" enctype="multipart/form-data">
									 @csrf
									  <br><br>
                  <input type="hidden" name="id" value="{{$data->id}}">
									 <input type="file" name="image" class="form-control-sm" id="image" onchange="readURL(this);" >
									 &nbsp;&nbsp;<i><small id="cover" class="form-text text-muted mt-0">**Ukuran file cover Maks. 10 MB;.</small></i> <br>
									 <input type="submit" class="btn btn-primary" value="Upload Bukti">
									 </form>
                  @endif
							  </td> 
							  <td>@if($data->status == "terkirim")
                        	    Barang sudah dikirim, terimakasih.
                    @elseif ($data->status =="tidakterkirim")
	                    		Barang Sedang Di proses
                    @elseif ($data->status =="Diterima")
                          Terimakasih sudah Berbelanja!
	                   @endif
	                   @empty
	                    		Tidak Ada Item!
                </td>
                                  </div>
                                </div>
                              </div>
                          </div>
                         @endforelse
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

