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
                                    <th colspan="4">{{ $alats->nama_alat }} {{ $alats->lokasi }}</th>
                                </thead>
                                <tbody>
                                    <td>Tanggal</td>
                                    <td>Vendor</td>
                                    <td>Biaya</td>
                                    <td></td>
                                </tbody>
                                @foreach ($alats->perawatan as $perawatan)
                                    <tbody>
                                        <td>{{ $perawatan->tanggal }}</td>
                                        <td>{{ $perawatan->vendor }}</td>
                                        <td>Rp. {{ $perawatan->biaya }}</td>
                                        <td>
                                            <button class="btn btn-danger btn-hover">
                                                <a href="{{ url('service/detail', $perawatan->slug) }}">
                                                    Detail
                                                </a>
                                            </button>
                                        </td>
                                    </tbody>
                                @endforeach
                              </table>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="text-right">
                                      <button type="button" class="btn btn-primary">
                                        <a href="{{ url('service/tambah', $alats->id) }}">Tambah Service</a>
                                      </button>
                                      <button type="button" class="btn btn-danger">
                                        <a href="{{ url('service/print-all', $alats->id) }}" target="_blank">Print</a>
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