@extends('layouts.master')

@section('title')
    Data Category
@endsection

@section('content')
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Category</h1>

<<<<<<< HEAD
        @if(Session::has('berhasil'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success,</strong>
                {{ Session::get('berhasil') }}
            </div>
        @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
            </div>
            <div class="card-body">
                 <a href="#" class="btn mb-3 btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Tambah Data Member</span>
                </a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($categorys as $category)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$category->id}}</td>
                      <td>{{$category->nama}}</td>
                       <td class="text-center">
                           <a href="{{url('category/'.$category->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                           <form action="{{url('category/'.$category->id)}}" method="POST" class="d-inline">
                               @method('delete')
                               @csrf
                               <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Delete</button>
                           </form>
                          </td>
                        </tr>
                      @empty
                      <td colspan="3">Data Category Kosong</td>
                      @endforelse
                  </tbody>
                </table>
                {{ $categorys->links() }}
              </div>
            </div>
          </div>
                @endsection
=======
<a href="/category/create" class="btn btn-primary btn-sm my-3">create</a>
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session("success")}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class='table-responsive'>

    <table class="table table-bordered table-striped" id="dataTable" >
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Id</th>
            <th scope="col">Nama category</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($categorys as $category)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$category->id}}</td>
                <td>{{$category->nama}}</td>
                 <td class="text-center">
                     <a href="{{url('category/'.$category->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                     <form action="{{url('category/'.$category->id)}}" method="POST" class="d-inline">
                         @method('delete')
                         @csrf
                         <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Delete</button>
                     </form>
                 </td>
              </tr>
            @empty
                <tr>
                    <td colspan="3">Data Category Kosong</td>
                </tr>
            @endforelse
        </tbody>
      </table>
    {{ $categorys->links() }}
</div>

@endsection
>>>>>>> a2ec98b7050f2bc3d1fd4ba3b51bd26fe5d82205
