@extends('layouts.master')

@section('title')
    Edit Data Penerbit
@endsection
@section('content')
    <!-- Begin Page Content -->

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Data Penerbit</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Data Penerbit</h6>
                <div class="card-body">
                    <form action="{{url('penerbit/'.$penerbit->id)}}" method="post" class="d-inline">
                        @method ("PUT")
                        @csrf
                        <div class="form-group">
                        <label for="nama">Nama Penerbit</label>
                        <input type="text" name="nama_penerbit" class="form-control @error('nama_penerbit') is-invalid @enderror" id="nama" value="{{old('nama_penerbit', $penerbit->nama_penerbit)}}">
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </form>
                    <a href="{{route('penerbit.index')}}" class="btn btn-warning btn-sm">Cancel</a>
                </div>
            </div>
        </div>

@endsection
