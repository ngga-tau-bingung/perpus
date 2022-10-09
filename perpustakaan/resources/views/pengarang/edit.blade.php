@extends('layouts.master')

@section('title')
    Edit Data Pengarang
@endsection
@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Edit Data Pengarang</h1>
         
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
       <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Edit Data Pengarang</h6>
                <div class="card-body">
                    <form action="{{url('pengarang/'.$pengarang->id)}}" method="post" class="d-inline">
                        @method ("PUT")
                        @csrf
                        <div class="form-group">
                        <label for="nama">Nama Pengarang</label>
                        <input type="text" name="nama_pengarang" class="form-control @error('nama_pengarang') is-invalid @enderror" id="nama" value="{{old('nama_pengarang', $pengarang->nama_pengarang)}}">
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </form>
                    <a href="{{route('pengarang.index')}}" class="btn btn-warning btn-sm">Cancel</a>
                </div>
            </div>
     </div>
@endsection
