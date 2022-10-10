@extends('layouts.master')

@section('title')
    Data Category
@endsection
@push('script')

		<script>
		$(function () {
			$("#example1").DataTable();
		});
		</script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.btndelete').click(function (e) {
                e.preventDefault();

                var deleteid = $(this).closest("tr").find('.delete_id').val();

                swal({
                        title: "Apakah anda yakin?",
                        text: "Setelah dihapus, Anda tidak dapat memulihkan data ini lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                            var data = {
                                "_token": $('input[name=_token]').val(),
                                'id': deleteid,
                            };
                            $.ajax({
                                type: "DELETE",
                                url: 'category/' + deleteid,
                                data: data,
                                success: function (response) {
                                    swal(response.status, {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location.reload();
                                        });
                                }
                            });
                        }
                    });
            });

        });

    </script>


@endpush
@push('style')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
 
@endpush
@section('content')
    <!-- Begin Page Content -->

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Data Category</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Category</h6>
          
            <div class="card-body">
                 <a href="{{route('category.create')}}" class="btn mb-3 btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Tambah Category</span>
                </a>
              <div class="table-responsive">
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Id</th>
                          <th scope="col">Name</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($categorys as $key => $category)
                             <tr>
                              <input type="hidden" class="delete_id" value="{{ $category->id }}">
                              <td>{{$key + 1}}</td>
                              <td>{{$category->id}}</td>
                              <td>{{$category->nama}}</td>
                               <td class="text-center">
                                   <a href="{{url('category/'.$category->id.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                                   <form action="{{route('category.destroy', $category->id)}}" method="POST" class="d-inline">
                                       @csrf
                                       @method('delete')
                                       <button class="btn btn-danger btn-sm btndelete">Hapus</button>
                                   </form>
                                  </td>
                                </tr>
                                @empty
                              <h5>Data Category Kosong</h5>
                            @endforelse
                      </tbody>
                </table>
              </div>
            </div>
        </div>
          
            @endsection
