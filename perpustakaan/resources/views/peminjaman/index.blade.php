@extends('layouts.master')

@section('title')
    Halaman Table Peminjaman
@endsection

@section('content')
   <a href="#" class="btn btn-primary btn-sm my-3">Create</a> 

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
               <tr>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>#</td>
                    <td>
                        <form action="#" method="POST">
                            <a href="#" class="btn btn-info btn-sm">Detail</a>
                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                    </td>
               </tr>
        </tbody>
    </table>
@endsection