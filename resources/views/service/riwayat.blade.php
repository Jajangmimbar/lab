@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Riwayat Perawatan</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover">
                                <thead>
                                    <th>Kode Service</th>
                                    <th>Nama Alat</th>
                                    <th>Vendor</th>
                                    <th>Kerusakan</th>
                                    <th>Part</th>
                                    <th>Biaya</th>
                                    <th>Sumber Dana</th>
                                    <th>Action</th>
                                </thead>
                                @foreach ($perawatans as $perawatan)
                                    <tbody>
                                      <td>{{ $perawatan->kode_service }}</td>
                                      <td>{{ $perawatan->alat->nama_alat }}</td>
                                      <td>{{ $perawatan->vendor }}</td>
                                      <td>{{ $perawatan->kerusakan }}</td>
                                      <td>{{ $perawatan->part }}</td>
                                      <td>{{ $perawatan->biaya }}</td>
                                      <td>{{ $perawatan->sumber_dana }}</td>
                                      <td>
                                          <button class="btn btn-primary btn-hover" type="button">
                                              <a href="{{ url('service/detail', $perawatan->slug) }}">Detail</a>
                                          </button>
                                      </td>
                                    </tbody>
                                @endforeach
                              </table>
                              {{ $perawatans->links() }}
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="text-right">
                                      <button type="button" class="btn btn-danger">
                                          <a href="{{ url('riwayat-service/print') }}" target="_blank">Print</a>
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