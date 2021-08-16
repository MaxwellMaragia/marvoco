@extends('admin.layouts.app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Youths list
            </h1>
            <ol class="breadcrumb">
                <li class="active">youths</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header">
                      <a href="{{ route('youth.create') }}" class="btn btn-primary"><span class="fa fa-plus"></span>   Add new</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @include('includes.messages')
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Names</th>
                                <th>Identification</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Physical address</th>
                                <th>Status</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($youths as $youth)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td><strong>{{ $youth->names }}</strong></td>
                                    <td>
                                        {{ $youth->identification }}
                                    </td>
                                    <td>
                                        {{ $youth->dob }}
                                    </td>
                                    <td>
                                        {{ $youth->gender }}
                                    </td>
                                    <td>
                                        {{ $youth->email }}
                                    </td>
                                    <td>
                                        {{ $youth->physical_address }}
                                    </td>
                                    <td>
                                        @if($youth->status == 1)
                                            <span class="badge bg-green">Activated</span>
                                        @else
                                            <span class="badge bg-red">Not active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a data-toggle="tooltip" data-placement="bottom" title="View" href="{{ route('youth.show',$youth->id) }}" class="badge bg-light-blue " disabled><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit" href="{{ route('youth.edit',$youth->id) }}" class="badge bg-light-blue " disabled><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <form id="delete-form-{{ $youth->id }}" action="{{ route('youth.destroy',$youth->id) }}" style="display: none;" method="post">
                                            {{@csrf_field()}}
                                            {{@method_field('DELETE')}}
                                        </form>
                                        <a data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="
                                                if(confirm('Are you sure you want to delete this youth?'))
                                                {event.preventDefault();
                                                document.getElementById('delete-form-{{ $youth->id }}').submit();
                                                }
                                                else{
                                                event.preventDefault();
                                                }
                                                " class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>S.no</th>
                                <th>Names</th>
                                <th>Identification</th>
                                <th>D0B</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Physical address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                        </table>
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
