@extends('layouts.master')

@section('title')
    Tambah Data Pengarang
@endsection
@section('content')
     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Tambah Data Pengarang</h1>
         
     <!-- DataTales Example -->
     <div class="card shadow mb-4">
       <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pengarang</h6>
                <div class="card-body">
                    <form action="{{route('pengarang.store')}}" method="post" class="d-inline">
                        @csrf
                      <div class="form-group">
                        <label for="nama">Nama Pengarang</label>
                        <input type="text" name="nama_pengarang" class="form-control @error('nama_pengarang') is-invalid @enderror" id="nama">
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </form>
                    <a href="{{route('pengarang.index')}}" class="btn btn-warning btn-sm">Cancel</a>
                </div>
            </div>
        </div>
@endsection
