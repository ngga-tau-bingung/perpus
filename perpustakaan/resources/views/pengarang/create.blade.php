@extends('layouts.master', ["title"=>"Create Pengarang"])

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
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
    </div>
@endsection
