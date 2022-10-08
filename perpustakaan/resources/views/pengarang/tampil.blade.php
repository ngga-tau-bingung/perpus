@extends('layouts.master')

@section('title')
    Pengarang
@endsection

@section('content')

<a href="/pengarang/create" class="btn btn-primary btn-sm my-3">create</a>
<div class='table-responsive'>

    <table class="dataTables_wrapper table dt-bootstrap4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($data as $key => $item)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$item->nama}}</td>
                <td>
                    <form action="pengarang/{{$item->id}}" method="POST">
                        <a href="/pengarang/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="pengarang/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>      
                        @method('delete')
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                </td>
              </tr>
            @empty
                <h1>Data Pengarang Kosong</h1>
            @endforelse
        </tbody>
      </table>
</div>

@endsection