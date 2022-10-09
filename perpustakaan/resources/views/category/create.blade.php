@extends('layouts.master')

@section('title')
    Tambah Data Category
@endsection
@section('content')
    <!-- Begin Page Content -->

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tambah Data Category</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Category</h6>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="post" class="d-inline">
                        @csrf
                        <div class="form-group">
                        <label for="nama">Nama Category</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </form>
                    <a href="{{route('category.index')}}" class="btn btn-warning btn-sm">Cancel</a>
                </div>
            </div>
        </div>
@endsection
