@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Detail Alat</li>
                            <li class="breadcrumb-item active">{{ $alats->nama_alat }}</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-7 m30">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                          <thead>
                                              <th colspan="2">{{ $alats->nama_alat }} {{ $alats->lokasi }}</th>
                                          </thead>
                                              <tbody>
                                                  <tr>
                                                        <td>No. Asset</td>
                                                        <td>{{ $alats->nomor_asset }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Lokasi</td>
                                                      <td>{{ $alats->lokasi }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Merk</td>
                                                      <td>{{ $alats->merk }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Tipe</td>
                                                      <td>{{ $alats->tipe }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Jumlah</td>
                                                      <td>{{ $alats->jumlah }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Spesifikasi</td>
                                                      <td>{{ $alats->spesifikasi }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Internal Service Maintenance</td>
                                                      <td>{{ $alats->ism }} Bulan</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Terakhir Service</td>
                                                      <td>{{ $alats->service_terakhir }}</td>
                                                  </tr>
                                                  <tr>
                                                      <td>Manual Book</td>
                                                      <td>
                                                          <button class="btn btn-danger btn-hover">
                                                            <a href="{{ asset('storage/alat') }}/{{ $alats->nama_alat }}/{{ $alats->manual_book }}" target="_blank">Download</a>
                                                          </button>
                                                      </td>
                                                  </tr>
                                              </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-4 p100">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="{{ asset('storage/alat') }}/{{ $alats->nama_alat }}/{{ $alats->foto_alat }}" alt="" style="width:300px !important;">
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-primary fr btn-admin">
                                            <a href="{{ url('alat/edit', $alats->slug) }}">Edit</a>
                                        </button>
                                        <form action="{{ url('alat/hapus', $alats->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-admin">Hapus</button>
                                        </form>
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