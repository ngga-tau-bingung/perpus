@extends('layouts.master')

@section('title')
    Data Peminjaman
@endsection

@section('content')
    <!-- Begin Page Content -->

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>
         
        @if(Session::has('berhasil'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success,</strong>
                {{ Session::get('berhasil') }}
            </div>
        @endif
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
            </div>
            <div class="card-body">
            
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Pinjaman Aktif</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $key => $item)
                    @php
                    
                       $pinjaman_aktif = App\Models\Peminjaman::where('user_id', $item->id)->count();
                    @endphp
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->name}}</td>
                          <td>{{$item->email}}</td>
                          <td>{{$pinjaman_aktif}}</td>
                          <td>
                            <a href="/userpinjam/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                          </td>
                        </tr>
                      @empty
                          <h5>Data Peminjaman Kosong</h5>
                      @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection

