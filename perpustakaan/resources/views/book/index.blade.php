@extends('layouts.master')

@section('title')
    Halaman Buku Perpustakaan
@endsection

@section('content')
<a href="/book/create" class="btn btn-primary btn-sm my-3">create</a>
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
          <th scope="col">Cover</th>
          <th scope="col">Nama</th>
          <th scope="col">Category</th>
          <th scope="col">Pengarang</th>
          <th scope="col">Penerbit</th>
          <th scope="col" class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($books as $book)
            <tr>
              <td>{{$loop->iteration}}</td>
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
              <tr>
                  <td colspan="3">Data Buku Kosong</td>
              </tr>
          @endforelse
      </tbody>
    </table>
  {{ $books->links() }}
</div>
@endsection 

