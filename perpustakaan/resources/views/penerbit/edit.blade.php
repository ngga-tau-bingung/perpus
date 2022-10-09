@extends('layouts.master', ["title"=>"Create Penerbit"])

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
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
    </div>
@endsection
