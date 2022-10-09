@extends('layouts.master', ["title"=>"Create Pengarang"])

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
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
    </div>
@endsection
