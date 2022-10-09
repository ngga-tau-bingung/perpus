@extends('layouts.master', ["title"=>"Create Penerbit"])

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('penerbit.store')}}" method="post" class="d-inline">
                        @csrf
                        <div class="form-group">
                        <label for="nama">Nama Penerbit</label>
                        <input type="text" name="nama_penerbit" class="form-control @error('nama_penerbit') is-invalid @enderror" id="nama">
                      </div>
                      <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </form>
                    <a href="{{route('penerbit.index')}}" class="btn btn-warning btn-sm">Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
