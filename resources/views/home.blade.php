@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card-header card-header-rose card-header-icon">
                       
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="tanggal" style="float: right !important;">
                                {{ $now }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">account_circle</i>
                                        </div>
                                        <p class="card-category">USERS</p>
                                        <h3 class="card-title">{{ $users->count() }}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                           jumlah user yang terdaftar
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">build</i>
                                        </div>
                                        <p class="card-category">ALAT</p>
                                        <h3 class="card-title">{{ $alats->count() }}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                           jumlah alat yang ada
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">work</i>
                                        </div>
                                        <p class="card-category">SERVICE</p>
                                        <h3 class="card-title">{{ $perawatans->count() }}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                           jumlah service alat
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">book</i>
                                        </div>
                                        <p class="card-category">PEMINJAMAN</p>
                                        <h3 class="card-title">{{ $pinjams->count() }}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                           jumlah alat yang di pinjam
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <a href="{{ url('/service', $alat->id) }}" class="btn-admin">
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
                                      <button type="button" class="btn btn-danger">
                                          <a href="{{ url('alat/print') }}" target="_blank">Print</a>
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