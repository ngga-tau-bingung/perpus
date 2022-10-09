@extends('layouts.master')

@section('title')
    Admin Update
@endsection
@push('script')

		<script>
		$(function () {
			$("#example1").DataTable();
		});
		</script>

@endpush
@push('style')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
 
@endpush
@section('content')
    <!-- Begin Page Content -->

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Dashboard Admin</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Dashboard Admin</h6>
          
            <div class="card-body">
                 <a href="{{url('admin/users/create')}}" class="btn mb-3 btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Tambah User</span>
                </a>
              <div class="table-responsive">
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Role</th>
                            <th scope="col" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @forelse ($users as $key => $user)
                             <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->role_as}}</td>
                                <td class="text-center">
                                    <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{url('admin/users/'.$user->id)}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                                @empty
                              <h5>Dashboard Admin Kosong</h5>
                            @endforelse
                      </tbody>
                </table>
              </div>
            </div>
        </div>      
     @endsection
