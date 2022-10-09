@extends('layouts.master', ["title"=>"Pengarang"])

@section('content')
    <!-- Begin Page Content -->

<div class='table-responsive'>
    <div class="col-sm-8">
        <a href="{{route('pengarang.create')}}" class="btn btn-primary btn-sm my-3">Create</a>
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{session("success")}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif
        <div class="card">
                <div class="card-body">
                     <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengarangs as $pengarang)
                                <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pengarang->id}}</td>
                                <td>{{$pengarang->nama_pengarang}}</td>
                                <td class="text-center">
                                    <a href="{{url('pengarang/'.$pengarang->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{url('pengarang/'.$pengarang->id)}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Delete</button>
                                    </form>
                                </td>
                              </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Data Pengarang Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                     </table>
                    {{ $pengarangs->links() }}
                </div>
        </div>
    </div>
</div>

@endsection
