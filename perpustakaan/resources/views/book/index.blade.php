@extends('layouts.master')

@section('title')
    Data Buku Perpustakaan
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
          <h1 class="h3 mb-2 text-gray-800">Data Buku Perpustakaan</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Buku Perpustakaan</h6>
          
            <div class="card-body">
                 <a href="{{route('book.create')}}" class="btn mb-3 btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Tambah Buku Perpustakaan</span>
                </a>
              <div class="table-responsive">
                <table class="table table-bordered" id="example1">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Category</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $key => $book)
                             <tr>
                                <td>{{$key + 1}}</td>
                                <td><img src="{{asset('/image/'.$book->image)}}" alt="" width="100"></td>
                                <td>{{$book->judul}}</td>
                                <td>{{$book->category->nama}}</td>
                                <td>{{$book->pengarang->nama_pengarang}}</td>
                                <td>{{$book->penerbit->nama_penerbit}}</td>
                                <td class="text-center">
                                    <a href="{{url('book/'.$book->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{url('book/'.$book->id)}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Delete</button>
                                    </form>
                                </td>
                              </tr>
                                @empty
                              <h5>Data Buku Perpustakaan Kosong</h5>
                            @endforelse
                      </tbody>
                </table>
              </div>
            </div>
        </div>
          
            @endsection
