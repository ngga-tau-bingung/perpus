@extends('layouts.master', ["title"=>"Create category"])

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
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
    </div>
@endsection
