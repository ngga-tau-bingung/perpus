@extends('layouts.master', ["title"=>"Edit Users"])

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{url('admin/users/'.$user->id)}}" method="post" class="d-inline">
                        @method ("PUT")
                        @csrf
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
    </div>
@endsection
