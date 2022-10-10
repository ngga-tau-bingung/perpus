@extends('layouts.master')

@section('title')
    New User
@endsection
@section('content')
    <!-- Begin Page Content -->

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Create New User</h1>

          <!-- DataTales Example -->
          <div class="col-md-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{url('admin')}}" method="POST" class="d-inline">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nama" value="{{old('name')}}" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama">Peran Users</label>
                            <select name="role_as" class="form-control form-select">
                                <option value="users">Pegawai</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                      <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </form>
                    <a href="{{url('admin')}}" class="btn btn-warning btn-sm">Cancel</a>
                </div>
            </div>
        </div>
@endsection
