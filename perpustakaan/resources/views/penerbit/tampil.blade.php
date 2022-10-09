@extends('layouts.master')

@section('title')
    Data Penerbit
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
          <h1 class="h3 mb-2 text-gray-800">Data Penerbit</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penerbit</h6>
          
            <div class="card-body">
                 <a href="{{route('penerbit.create')}}" class="btn mb-3 btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Tambah Penerbit</span>
                </a>
              <div class="table-responsive">
                <table class="table table-bordered" id="example1">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id</th>
                        <th scope="col">Nama Penerbit</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($penerbits as $key => $penerbit)
                             <tr>
                              <td>{{$key + 1}}</td>
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
                        <h1>Data Penerbit Kosong</h1>
                       @endforelse
                 </tbody>
                </table>
              </div>
            </div>
        </div>
            @endsection