@extends('layouts.app')
@section('title')
Users List
@endsection
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
<!-- Content Header (Page header) -->

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-1">

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="color:#115548; font-weight: bold;">User List</h3>
                        <div class="card-tools">
                            <a class="btn btn-sm active-color" href="{{route('user.create')}}">&nbsp;Add User</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered ">
                            <thead>
                                <tr style="background-color: #E4E4E4;">
                                    <th>#</th>
                                    <th>Name</th>
                                    {{-- <th>Email</th>--}}
                                    <th>User Id</th>
                                    <th> Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $row)
                                <tr style="background-color: #F5F5F5;">
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        @if($row->getRoleNames()->isNotEmpty())
                                        <span class="badge badge-success">
                                            {!! $row->getRoleNames()->implode("</span> <span class='badge '>") !!}
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        @can('User Edit')
                                        <div class="btn-group">
                                            {{-- <a href="{{ route('user.edit', $row) }}
                                            <i class="fa fa-pen"></i> </a>
                                            <a href="{{ route('user.edit', $row) }}
                                                               <i class=" fa fa-trash"></i> </a>
                                            --}}


                                            <form method="POST" action="{{ route('user.destroy',$row->id)}}" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-info btn-sm" href="{{ route('user.edit', $row->id) }}"><i class="fa fa-pen"></i> Edit</a>

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                        </div>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection



@section('script')
<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@endsection
@push('script-bottom')
<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endpush