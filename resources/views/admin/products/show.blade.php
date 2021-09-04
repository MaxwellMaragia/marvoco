@extends('admin.layouts.app')
@section('headSection')
    <link rel="stylesheet"
          href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

@endsection
@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Premier products list
            </h1>
            <ol class="breadcrumb">
                <li class="active">products</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header">
                    <a href="{{ route('products.create') }}" class="btn btn-primary"><span class="fa fa-plus"></span>
                        Add new</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('includes.messages')
                    <div class="table-responsive">
                        <div class="table-wrapper">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><img src='{{ Storage::url($product->image) }}' height="50px" width="50pxs"></td>
                                        <td><strong>{{ $product->name }}</strong></td>
                                        <td>{{ $product->title }}</td>
                                        <td>
                                            <a data-toggle="tooltip" data-placement="bottom" title="Edit"
                                               href="{{ route('products.edit',$product->id) }}"
                                               class="badge bg-light-blue " disabled><i class="fa fa-pencil-square-o"
                                                                                        aria-hidden="true"></i></a>
                                            <form id="delete-form-{{ $product->id }}"
                                                  action="{{ route('products.destroy',$product->id) }}"
                                                  style="display: none;" method="post">
                                                {{@csrf_field()}}
                                                {{@method_field('DELETE')}}
                                            </form>
                                            <a data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="
                                                if(confirm('Are you sure you want to delete this premier product?'))
                                                {event.preventDefault();
                                                document.getElementById('delete-form-{{ $product->id }}').submit();
                                                }
                                                else{
                                                event.preventDefault();
                                                }
                                                " class="badge bg-red"><i class="fa fa-trash"
                                                                          aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.no</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Actions</th>

                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>


@section('footerSection')
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
@endsection
