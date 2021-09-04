@extends('admin.layouts.app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('main-content')

    <div class="content-wrapper">
         <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">deliverables</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="{{ route('deliverables.create') }}" class="btn btn-success" style="margin-bottom:20px;">Add new</a><br>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deliverables as $deliverable)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img src='{{ Storage::url($deliverable->icon) }}' height="40px;"></td>
                                    <td>{{ $deliverable->title }}</td>
                                    <td>{{ $deliverable->description }}</td>
                                    <td><a href="{{ route('deliverables.edit',$deliverable->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                    <td>
                                    <form id="delete-form-{{ $deliverable->id }}" action="{{ route('deliverables.destroy',$deliverable->id) }}" style="display: none;" method="post">
                                        {{@csrf_field()}}
                                        {{@method_field('DELETE')}}
                                    </form>
                                    <a href="" onclick="
                                            if(confirm('Are you sure you want to delete this deliverable?'))
                                            {event.preventDefault();
                                            document.getElementById('delete-form-{{ $deliverable->id }}').submit();
                                            }
                                            else{
                                                event.preventDefault();
                                            }
                                            "><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>S.no</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                    </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

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
