@extends('dashboard.template')
@section('content')
@section('dash-sale','active')
<div class="row mt-3 mx-0">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4>Status</h4>
            </div>
            <div class="card-body">
                <form method="POST" action='{{url("dashboard/sale/$sale->id/update")}}'>
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="tidakterkirim">Belum Terkirim</option>
                            <option value="terkirim" >Terkirim</option>
                        </select>
                    </div>
                    <div class="form-group">       
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <a href='{{url("dashboard/sale")}}' class="btn btn-info">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- 
https://stackoverflow.com/questions/40122633/if-else-condition-in-blade-file-laravel-5-3 -->

