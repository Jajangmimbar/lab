@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Daftar Alat</li>
                        </ol>
                    </div>
                    <div class="card-body">
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
                                    <th>Action</th>
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
                                        <button class="btn btn-primary btn-hover btn-admin">
                                            <a href="{{ url('alat/edit', $alat->slug) }}">edit</a>
                                        </button>
                                        <form action="{{ url('alat/hapus', $alat->id) }}" method="post" class="fl">
                                            @csrf
                                            <button class="btn btn-danger btn-hover btn-admin">
                                                Hapus
                                            </button>
                                        </form>
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