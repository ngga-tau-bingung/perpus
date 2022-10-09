@extends('layouts.master')

@section('title')
    Data Penerbit
@endsection

@section('content')
    <!-- Begin Page Content -->

<<<<<<< HEAD
<a href="/penerbit/create" class="btn btn-primary btn-sm my-3">create</a>
@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session("success")}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class='table-responsive'>

    <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Id</th>
            <th scope="col">Nama Penerbit</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($penerbits as $penerbit)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$penerbit->id}}</td>
                <td>{{$penerbit->nama_penerbit}}</td>
                 <td class="text-center">
                     <a href="{{url('penerbit/'.$penerbit->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                     <form action="{{url('penerbit/'.$penerbit->id)}}" method="POST" class="d-inline">
                         @method('delete')
                         @csrf
                         <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Delete</button>
                     </form>
                 </td>
              </tr>
            @empty
                <tr>
                    <td colspan="3">Data Pengarang Kosong</td>
                </tr>
            @endforelse
        </tbody>
      </table>
    {{ $penerbits->links() }}
</div>

@endsection
=======
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Penerbit</h1>
         
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
              <h6 class="m-0 font-weight-bold text-primary">Data Penerbit</h6>
            </div>
            <div class="card-body">
                 <a href="#" class="btn mb-3 btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#insertModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Tambah Data Penerbit</span>
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
                    @forelse ($data as $key => $item)
                        <tr>
                          <td>{{$key + 1}}</td>
                          <td>{{$item->nama}}</td>
                          <td>
                              <form action="pengarang/{{$item->id}}" method="POST">
                                  <a href="/pengarang/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                                  <a href="pengarang/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>      
                                  @method('delete')
                                  @csrf
                                  <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                              </form>
                          </td>
                        </tr>
                      @empty
                          <h1>Data Penerbit Kosong</h1>
                      @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
                    @endsection
>>>>>>> 600c995 (absen)
