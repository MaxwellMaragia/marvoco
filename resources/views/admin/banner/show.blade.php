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
                    <h3 class="box-title">Banners</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a href="{{ route('banner.create') }}" class="btn btn-success" style="margin-bottom:20px;">Add new</a><br>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Image</th>
                            <th>Title top</th>
                            <th>Title bottom</th>
                            <th>Subtitle</th>
                            <th>Button text</th>
                            <th>Button url</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $banner)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><img src='{{ Storage::url($banner->image) }}' height="50px" width="100pxs"></td>
                                    <td>{{ $banner->title_top }}</td>
                                    <td>{{ $banner->title_bottom }}</td>
                                    <td>{{ $banner->subtitle }}</td>
                                    <td>{{ $banner->button_text }}</td>
                                    <td>{{ $banner->url }}</td>

                                    <td><a href="{{ route('banner.edit',$banner->id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                                    <td>
                                    <form id="delete-form-{{ $banner->id }}" action="{{ route('banner.destroy',$banner->id) }}" style="display: none;" method="post">
                                        {{@csrf_field()}}
                                        {{@method_field('DELETE')}}
                                    </form>
                                    <a href="" onclick="
                                            if(confirm('Are you sure you want to delete this banner?'))
                                            {event.preventDefault();
                                            document.getElementById('delete-form-{{ $banner->id }}').submit();
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
                            <th>Image</th>
                            <th>Title top</th>
                            <th>Title bottom</th>
                            <th>Subtitle</th>
                            <th>Button text</th>
                            <th>Button url</th>
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
