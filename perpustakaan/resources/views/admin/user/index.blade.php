@extends('layouts.master', ['title' => 'Admin update'])

@section('content')

    <a href="{{url('admin/users/create')}}" class="btn btn-primary btn-sm my-3">Create New User</a>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session("success")}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class='table-responsive'>

    <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Role</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role_as}}</td>
                 <td class="text-center">
                     <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                     <form action="{{url('admin/users/'.$user->id)}}" method="POST" class="d-inline">
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
        {{ $users->links() }}
</div>

@endsection
