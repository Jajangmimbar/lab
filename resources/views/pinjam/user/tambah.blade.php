@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Pinjam Alat</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{ url('/pinjam-alat') }}" enctype="multipart/form-data" method="post" style="width:100% !important;">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-7 m30">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <th colspan="2">Pinjam Alat</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Kode Peminjaman</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <input type="text" class="form-control text-disable" name="kode" disabled value="{{ $nomor }}">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Peminjaman</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <input type="date" name="tanggal_pinjam" class="form-control" >
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tanggal Pengembalian</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <input type="date" name="tanggal_kembali" class="form-control" >
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Peminjam</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">{{ Auth::User()->name }}</label>
                                                                    <input type="text" name="nama_peminjam" class="form-control" value="{{ Auth::User()->name }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Alat</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <select class="form-control selectpicker" data-style="btn btn-link" name="nama_alat">
                                                                        <option value="">-----</option>
                                                                        @foreach ($alat as $alat)
                                                                            <option value="{{ $alat->nama_alat }}">{{ $alat->nama_alat }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">masukan jumlah</label>
                                                                    <input type="number" name="jumlah" class="form-control" >
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Keperluan</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">masukan keperluan peminjaman</label>
                                                                    <input type="text" name="keperluan" class="form-control" >
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
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