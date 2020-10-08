@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tambah Service</li>
                            <li class="breadcrumb-item active">{{ $alats->nama_alat }}</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{ url('service/tambah', $alats->id) }}" enctype="multipart/form-data" method="post" style="width:100% !important;">
                                @csrf
                                <div class="row">
                                    <div class="col-md-7 m30">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <th colspan="2">{{ $alats->nama_alat }} {{ $alats->lokasi }}</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Kode Service</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <input type="text" class="form-control text-disable" name="kode_service" disabled value="{{ $nomor }}">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <input type="date" name="tanggal" class="form-control" >
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Vendor</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">masukan vendor</label>
                                                                    <input type="text" name="vendor" class="form-control" >
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kerusakan</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">masukan kerusakan alat</label>
                                                                    <input type="text" name="kerusakan" class="form-control" >
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Part Yang Diganti</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">masukan part alat yang diganti</label>
                                                                    <input type="text" name="part" class="form-control" >
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Biaya</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">masukan biaya service</label>
                                                                    <input type="text" name="biaya" class="form-control" >
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sumber Dana</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">masukan sumber dana service</label>
                                                                    <input type="text" name="sumber_dana" class="form-control" >
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
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                                        <div>
                                                            <span class="btn btn-rose btn-round btn-file">
                                                                <span class="fileinput-new">Upload Foto Sebelum</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="hidden"><input type="file" name="foto_sebelum">
                                                                <div class="ripple-container"></div>
                                                            </span>
                                                            <p class="required">* maksimal input file 500MB</p>
                                                            <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                        </div>
                                                </div>
                                            </div>
                                              <div class="col-md-12 p20">
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                                        <div>
                                                            <span class="btn btn-rose btn-round btn-file">
                                                                <span class="fileinput-new">Upload Foto Sesudah</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="hidden"><input type="file" name="foto_sesudah">
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