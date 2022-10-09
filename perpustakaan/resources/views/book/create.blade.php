@extends('layouts.master')

@section('title')
   Tambah Data Buku Perpustakaan
@endsection
@section('content')
     <!-- Begin Page Content -->

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Tambah Data Buku Perpustakaan</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data Buku Perpustakaan</h6>
                <div class="card-body">
                    <form action="{{route('book.store')}}" method="post" class="d-inline" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul">Nama book</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" id="nama">
                      </div>
                      <div class="form-group">
                        <label for="pengarang">Category</label>
                        <select name="category_id" id="" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Pilih</option>
                            @foreach ($category as $cr)
                                <option value="{{$cr->id}}">{{$cr->nama}}</option>
                            @endforeach
                        </select>
                        </div>
                      <div class="form-group">
                        <label for="pengarang">Pengarang</label>
                        <select name="pengarang_id" id="" class="form-control @error('pengarang_id') is-invalid @enderror">
                            <option value="">Pilih</option>
                            @foreach ($pengarang as $pr)
                                <option value="{{$pr->id}}">{{$pr->nama_pengarang}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <select name="penerbit_id" id="" class="form-control @error('penerbit_id') is-invalid @enderror">
                                <option value="">Pilih</option>
                                @foreach ($penerbit as $pb)
                                    <option value="{{$pb->id}}">{{$pb->nama_penerbit}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun Terbit</label>
                                <input type="text" name="tahun" class="form-control @error('tahun') is-invalid @enderror" id="tahun">
                          </div>
                          <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </form>
                    <a href="{{route('book.index')}}" class="btn btn-warning btn-sm">Cancel</a>
                </div>
            </div>
        </div>
@endsection
