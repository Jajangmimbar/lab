@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                       
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
                            <li class="breadcrumb-item active">{{ $users->name }}</li>
                        </ol>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="{{ url('user/update', $users->id) }}" enctype="multipart/form-data" method="post" style="width:100% !important;">
                                @csrf
                                @method('PATCH')
                                <div class="row justify-content-center">
                                    <div class="col-md-7 m30">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <th colspan="2">Edit User</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">nama user</label>
                                                                    <input type="text" name="name" class="form-control" value="{{ $users->name }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">email user</label>
                                                                    <input type="email" name="email" class="form-control" value="{{ $users->email }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Password</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">password</label>
                                                                    <input type="password" name="password" class="form-control" value="{{ $users->password }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Konfirmasi Password</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">masukan ulang password</label>
                                                                    <input type="password" name="password-confirmation" class="form-control" value="{{ $users->password }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Handphone</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">masukan nomor handphone</label>
                                                                    <input type="text" name="no_handphone" class="form-control" value="{{ $users->no_handphone }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Foto</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <input type="file" name="foto" class="form-control" value="{{ $users->foto }}">
                                                                    <p class="required">* maksimal input file 500MB</p>
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <label class="bmd-label-floating">masukan alamat user</label>
                                                                    <input type="text" name="alamat" class="form-control" value="{{ $users->alamat }}">
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hak Akses</td>
                                                            <td>
                                                                <div class="form-group bmd-form-group">
                                                                    <select class="form-control selectpicker" data-style="btn btn-link" name="hak_akses">
                                                                        <option value="{{ $users->hak_akses }}">{{ $users->hak_akses }}</option>
                                                                        <option value="Admin">Admin</option>
                                                                        <option value="User">User</option>
                                                                    </select>
                                                                </div>    
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-danger">
                                                <a href="{{ url('/user') }}">Cancel</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection