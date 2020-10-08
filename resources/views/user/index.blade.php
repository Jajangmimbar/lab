@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Daftar User</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                              <table class="table table-bordered table-hover">
                                <thead>
                                    <th colspan="4">Daftar User</th>
                                </thead>
                                <tbody class="tt">
                                    <td>Nama</td>
                                    <td>Email</td>
                                    <td>Hak Akses</td>
                                    <td>Action</td>
                                </tbody>
                                @foreach ($users as $user)
                                    <tbody>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->hak_akses }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-hover">
                                                <a href="{{ url('user/edit', $user->id) }}">edit</a>
                                            </button>
                                            <form action="{{ url('user/hapus', $user->id) }}" method="post" class="fl">
                                                @csrf
                                                <button class="btn btn-danger btn-hover">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tbody>
                                @endforeach
                              </table>
                              {{ $users->links() }}
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="text-right">
                                      <button type="button" class="btn btn-primary btn-hover">
                                        <a href="{{ url('user/tambah') }}">Tambah User</a>
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