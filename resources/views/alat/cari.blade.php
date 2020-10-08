@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Hasil Pencarian</li>
                            <li class="breadcrumb-item active">{{ $cari }}</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <div class="tanggal">
                            {{ $now }}
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover">
                                <thead>
                                    <th>Nama</th>
                                    <th>no.asset</th>
                                    <th>lokasi</th>
                                    <th>merk</th>
                                    <th>tipe</th>
                                    <th>spesifikasi</th>
                                    <th>service berikutnya</th>
                                    <th>service terakhir</th>
                                    <th>status</th>
                                </thead>
                                @foreach ($alats as $alat)
                                    <tbody>
                                      <td>
                                            <a href="{{ url('alat/detail', $alat->slug) }}">
                                                {{ $alat->nama_alat }}
                                            </a>
                                      </td>
                                      <td>{{ $alat->nomor_asset }}</td>
                                      <td>{{ $alat->lokasi }}</td>
                                      <td>{{ $alat->merk }}</td>
                                      <td>{{ $alat->tipe }}</td>
                                      <td>{{ $alat->spesifikasi }}</td>
                                      <td>
                                            <a href="{{ url('/service', $alat->id) }}">
                                                {{ $alat->service_berikutnya }}
                                            </a>    
                                      </td>
                                      <td>{{ $alat->service_terakhir }}</td>
                                      <td>
                                          @if($alat->status == "Belum")
                                              <button class="btn btn-danger btn-hover">{{ $alat->status }}</button>
                                          @elseif($alat->status == "Selesai")
                                              <button class="btn btn-success btn-hover">{{ $alat->status }}</button>
                                        @endif
                                      </td>
                                    </tbody>
                                @endforeach
                              </table>
                              {{ $alats->links() }}
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="text-right">
                                      <button type="button" class="btn btn-primary">
                                        <a href="{{ url('/alat') }}">Tambah Alat</a>
                                      </button>
                                      <button type="button" class="btn btn-danger">Print</button>
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