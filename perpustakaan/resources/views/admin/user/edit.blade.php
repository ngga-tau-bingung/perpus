@extends('layouts.master')

@section('title')
    Edit User
@endsection
@section('content')
    <<!-- Begin Page Content -->

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Data Buku Perpustakaan</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Buku Perpustakaan</h6>
                <div class="card-body">
                    <form action="{{url('admin/users/'{{$user->id}})}}" method="POST" class="d-inline">
                        @csrf
                        @method ('put')
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nama" value="{{old('name', $user->name)}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Peran Users</label>
                            <select name="role_as" class="form-control form-select">
                                <option selected>{{$user->role_as}}</option>
                                <option value="admin">Admin</option>
                                <option value="users">Pegawai</option>
                            </select>
                        </div>
                      <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </form>
                    <a href="{{url('admin/users')}}" class="btn btn-warning btn-sm">Cancel</a>
                </div>
            </div>
        </div>
@endsection
