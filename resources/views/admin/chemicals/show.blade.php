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
                chemicals list
            </h1>
            <ol class="breadcrumb">
                <li class="active">chemicals</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header">
                    <a href="{{ route('chemicals.create') }}" class="btn btn-primary"><span class="fa fa-plus"></span>
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
                                    <th>Product category</th>
                                    <th>Product name</th>
                                    <th>Specification</th>
                                    <th>Packaging</th>
                                    <th>CAS</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($chemicals as $chemical)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td><strong>{{ $chemical->chemical_category->name }}</strong></td>
                                        <td>{{ $chemical->product }}</td>
                                        <td>{{ $chemical->specification }}</td>
                                        <td>{{ $chemical->packaging }}</td>
                                        <td>{{ $chemical->cas }}</td>
                                        <td>
                                            <a data-toggle="tooltip" data-placement="bottom" title="Edit"
                                               href="{{ route('chemicals.edit',$chemical->id) }}"
                                               class="badge bg-light-blue " disabled><i class="fa fa-pencil-square-o"
                                                                                        aria-hidden="true"></i></a>
                                            <form id="delete-form-{{ $chemical->id }}"
                                                  action="{{ route('chemicals.destroy',$chemical->id) }}"
                                                  style="display: none;" method="post">
                                                {{@csrf_field()}}
                                                {{@method_field('DELETE')}}
                                            </form>
                                            <a data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="
                                                if(confirm('Are you sure you want to delete this chemicals?'))
                                                {event.preventDefault();
                                                document.getElementById('delete-form-{{ $chemical->id }}').submit();
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
                                    <th>Product category</th>
                                    <th>Product name</th>
                                    <th>Specification</th>
                                    <th>Packaging</th>
                                    <th>CAS</th>
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
