@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       <div class="row">
                           <div class="col-md-8">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Update Status Alat</li>
                                    <li class="breadcrumb-item active">{{ $pinjam->alat->nama_alat }}</li>
                                </ol>
                           </div>
                           <div class="col-md-4">
                            <div class="text-right card-title">
                                <button class="btn btn-warning">
                                    <a href="{{ url('/riwayat-peminjaman') }}">
                                        <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                                </button>
                            </div>
                        </div>
                       </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{ url('riwayat-peminjaman/update-status', $pinjam->id) }}" enctype="multipart/form-data" method="post" style="width:100% !important;">
                                @csrf
                                @method('PATCH')
                                <div class="row justify-content-center">
                                    <div class="col-md-7 m30">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <th colspan="2">Update Status Pinjaman {{ $pinjam->alat->nama_alat }} {{ $pinjam->lokasi }}</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Status Pinjaman</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <select class="form-control selectpicker" data-style="btn btn-link" name="status">
                                                                        <option value="Booking">Booking</option>
                                                                        <option value="Pinjam">Pinjam</option>
                                                                        <option value="Selesai">Selesai</option>
                                                                    </select>
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