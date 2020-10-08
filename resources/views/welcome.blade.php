{{-- @extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
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
                                    <th>service berikutnya</th>
                                    <th>service terakhir</th>
                                    <th>status</th>
                                </thead>
                                @foreach ($alats as $alat)
                                    <tbody>
                                      <td>{{ $alat->nama_alat }}</td>
                                      <td>{{ $alat->nomor_asset }}</td>
                                      <td>{{ $alat->lokasi }}</td>
                                      <td>{{ $alat->merk }}</td>
                                      <td>{{ $alat->tipe }}</td>
                                      <td>{{ $alat->spesifikasi }}</td>
                                      <td>{{ $alat->service_berikutnya }}</td>
                                      <td>{{ $alat->service_terakhir }}</td>
                                      <td>{{ $alat->status }}</td>
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
@endsection --}}