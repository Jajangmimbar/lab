@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Service</li>
                            <li class="breadcrumb-item active">{{ $perawatan->alat->nama_alat }}</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
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
                                                      <td class="text-disable">{{ $perawatan->kode_service }}</td>
                                                  </tr>
                                                  <tr>
                                                        <td>Tanggal</td>
                                                        <td class="text-disable">{{ $perawatan->tanggal }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Vendor</td>
                                                      <td>{{ $perawatan->vendor }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Kerusakan</td>
                                                      <td>{{ $perawatan->kerusakan }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Part yang diganti</td>
                                                      <td>{{ $perawatan->part }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Biaya</td>
                                                      <td>Rp. {{ $perawatan->biaya }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Sumber Dana</td>
                                                      <td>{{ $perawatan->sumber_dana }}</td>
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
                                            </div>    
                                        </div>
                                        <div class="col-md-12 p20">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{ asset('storage/service') }}/{{ $perawatan->vendor }}/{{ $perawatan->foto_sesudah }}" alt="" style="width:300px !important;">
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary">
                                            <a href="{{ url('service/edit', $perawatan->slug) }}">Edit</a>
                                        </button>
                                        <button type="button" class="btn btn-danger">
                                            <a href="{{ url('service/print-detail', $perawatan->slug) }}" target="_blank">Print</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection