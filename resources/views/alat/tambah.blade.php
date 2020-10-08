@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Form Tambah Alat</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{ url('alat/tambah') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row">
                                    <div class="col-md-7 m30">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label text-left">Nama Alat</label>
                                            <div class="col-md-8">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">masukan nama alat</label>
                                                    <input type="text" name="nama_alat" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label text-left">No.Asset</label>
                                            <div class="col-md-8">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">masukan nomor asset</label>
                                                    <input type="text" name="nomor_asset" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label text-left">Lokasi</label>
                                            <div class="col-md-8">
                                                <div class="form-group bmd-form-group">
                                                    <select class="form-control selectpicker" data-style="btn btn-link" name="lokasi">
                                                        <option value="">lokasi alat</option>
                                                        <option value="Ruang Sekertaris">Ruang Sekertaris</option>
                                                        <option value="Ruang Dosen 1">Ruang Dosen 1</option>
                                                        <option value="Ruang Dosen 2">Ruang Dosen 2</option>
                                                        <option value="Ruang Asisten 1">Ruang Asisten 1</option>
                                                        <option value="Ruang Asisten 2">Ruang Asisten 2</option>
                                                        <option value="Ruang Asisten 3">Ruang Asisten 3</option>
                                                        <option value="Ruang Asisten 4">Ruang Asisten 4</option>
                                                        <option value="Ruang Kuliah">Ruang Kuliah</option>
                                                        <option value="Ruang Meeting">Ruang Meeting</option>
                                                        <option value="Ruang Pengujian Alat">Ruang Pengujian Alat</option>
                                                      </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label text-left">Merk</label>
                                            <div class="col-md-8">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">masukan merk alat</label>
                                                    <input type="text" name="merk" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label text-left">Tipe</label>
                                            <div class="col-md-8">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">masukan tipe alat</label>
                                                    <input type="text" name="tipe" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label text-left">Jumlah</label>
                                            <div class="col-md-8">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">masukan jumlah alat</label>
                                                    <input type="text" name="jumlah" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label text-left">Spesifikasi</label>
                                            <div class="col-md-8">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">masukan spesifikasi alat</label>
                                                    <textarea name="spesifikasi" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label text-left">Interval Service Maintenance</label>
                                            <div class="col-md-8">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">masukan interval service maintenance</label>
                                                    <input type="number" name="ism" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label text-left">Service Terakhir</label>
                                            <div class="col-md-8">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating"></label>
                                                    <input type="date" name="service_terakhir" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-4 col-form-label text-left">Manual Book Alat(PDF)</label>
                                            <div class="col-md-8 p9">
                                                <input type="file" name="manual_book">
                                                <p class="required">* maksimal input file 500MB</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12 p100">
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                      <img src="{{ asset('assets/img/placeholder.jpg') }}" alt="...">
                                                    </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                                                        <div>
                                                            <span class="btn btn-rose btn-round btn-file">
                                                                <span class="fileinput-new">Foto Alat</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="hidden"><input type="file" name="foto_alat">
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
                                            <button type="button" class="btn btn-danger">
                                                <a href="{{ url('/home') }}">Cancel</a>
                                            </button>
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