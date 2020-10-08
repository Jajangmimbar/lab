@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Riwayat Peminjaman</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover">
                                <thead>
                                    <th>Kode Peminjaman</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Alat</th>
                                    <th>Jumlah</th>
                                    <th>Keperluan</th>
                                    <th>Status</th>
                                </thead>
                                @foreach (Auth::User()->pinjam as $pinjam)
                                    <tbody>
                                      <td>{{ $pinjam->kode }}</td>
                                      <td>{{ $pinjam->tanggal_pinjam }}</td>
                                      <td>{{ $pinjam->tanggal_kembali }}</td>
                                      <td>{{ $pinjam->nama_peminjam }}</td>
                                      <td>{{ $pinjam->alat->nama_alat }}</td>
                                      <td>{{ $pinjam->jumlah }}</td>
                                      <td>{{ $pinjam->keperluan }}</td>
                                      <td>
                                            @if($pinjam->status == "Booking")
                                                <button class="btn btn-danger btn-hover">{{ $pinjam->status }}</button>
                                             @elseif($pinjam->status == "Pinjam")
                                                <button class="btn btn-success btn-hover">{{ $pinjam->status }}</button>
                                            @elseif($pinjam->status == "Selesai")
                                                <button class="btn btn btn-hover">{{ $pinjam->status }}</button>
                                            @endif
                                      </td>
                                    </tbody>
                                @endforeach
                              </table>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="text-right">
                                      <button type="button" class="btn btn-danger">
                                          <a href="{{ url('riwayat-peminjaman/print', Auth::User()->id) }}" target="_blank">Print</a>
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