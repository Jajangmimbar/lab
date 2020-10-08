@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Service</li>
                            <li class="breadcrumb-item active">{{ $perawatan->alat->nama_alat }}</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{ url('service/update', $perawatan->slug) }}" enctype="multipart/form-data" method="post" style="width:100% !important;">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-7 m30">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <th colspan="2">{{ $perawatan->alat->nama_alat }} {{ $perawatan->alat->lokasi }}</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Kode Service</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <input type="text" name="kode_service" class="form-control text-disable" value="{{ $perawatan->kode_service }}" disabled>
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <input type="text" name="tanggal" class="form-control text-disable" value="{{ $perawatan->tanggal }}" disabled>
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Vendor</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">vendor</label>
                                                                    <input type="text" name="vendor" class="form-control" value="{{ $perawatan->vendor }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kerusakan</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">kerusakan alat</label>
                                                                    <input type="text" name="kerusakan" class="form-control" value="{{ $perawatan->kerusakan }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Part Yang Diganti</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">part alat yang diganti</label>
                                                                    <input type="text" name="part" class="form-control" value="{{ $perawatan->part }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Biaya</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">biaya service</label>
                                                                    <input type="text" name="biaya" class="form-control" value="{{ $perawatan->biaya }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sumber Dana</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">sumber dana service</label>
                                                                    <input type="text" name="sumber_dana" class="form-control" value="{{ $perawatan->sumber_dana }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 p20">
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <img src="{{ asset('storage/service') }}/{{ $perawatan->vendor }}/{{ $perawatan->foto_sebelum }}" alt="" style="width:300px !important;">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="">
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-rose btn-round btn-file">
                                                                <span class="fileinput-new">Upload Foto Sebelum</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="hidden"><input type="file" name="foto_sebelum" value="{{ $perawatan->foto_sebelum }}">
                                                                <div class="ripple-container"></div>
                                                            </span>
                                                            <p class="required">* maksimal input file 500MB</p>
                                                            <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                        </div>
                                                </div>
                                            </div>
                                              <div class="col-md-12 p20">
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail">
                                                            <img src="{{ asset('storage/service') }}/{{ $perawatan->vendor }}/{{ $perawatan->foto_sesudah }}" alt="" style="width:300px !important;">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="">
                                        
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-rose btn-round btn-file">
                                                                <span class="fileinput-new">Upload Foto Sesudah</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="hidden"><input type="file" name="foto_sesudah" value="{{ $perawatan->foto_sesudah }}">
                                                                <div class="ripple-container"></div>
                                                            </span>
                                                            <p class="required">* maksimal input file 500MB</p>
                                                            <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection