@extends('layouts.master', ["title"=>"Create Peminjaman"])

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Data Buku</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="dataTable" >
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Nama</th>
                        
                            <th scope="col" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{asset('/image/'.$book->image)}}" alt="" width="100"></td>
                                <td>{{$book->judul}}</td>
                            
                                 <td class="text-center">
                                     <form action="{{url('pinjam/'.$book->id)}}" method="POST" class="d-inline">
                                         @csrf
                                         <input type="hidden" name="user_id" value="{{$user->id}}">
                                         <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure ?')">Pinjam</button>
                                     </form>
                                 </td>
                              </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Data Buku Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                      </table>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">History Pinjaman</div>
                <div class="card-body">
                   <table class="table table-bordered">
                    <tr>
                        <td>Nama</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$user->email}}</td>
                    </tr>
                   </table>

                   <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Buku</th>
                          <th>Tanggal Pinjam</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($userbooks as $ub)

                        @php
                        $book = App\Models\Book::find($ub->book_id);
                        //dd($book);
                        @endphp
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$book->judul}}</td>
                              <td>{{$ub->tgl_pinjam}}</td>
                              <td>
                                <a href="" class="btn btn-info btn-sm">Ubah Status</a>
                              </td>
                            </tr>
                          @empty
                              <h1>Data Peminjaman Kosong</h1>
                          @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
