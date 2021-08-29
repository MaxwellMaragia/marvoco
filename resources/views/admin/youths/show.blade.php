@extends('admin.layouts.app')
@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <style>
        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            background: #fff;
            margin: 0 auto;
            padding: 20px 30px 5px;
            box-shadow: 0 0 1px 0 rgba(0,0,0,.25);
        }
        .table-title .btn-group {
            float: right;
        }
        .table-title .btn {
            min-width: 50px;
            border-radius: 2px;
            border: none;
            padding: 6px 12px;
            font-size: 95%;
            outline: none !important;
            height: 30px;
        }
        .table-title {
            min-width: 100%;
            border-bottom: 1px solid #e9e9e9;
            padding-bottom: 15px;
            margin-bottom: 5px;
            background: rgb(0, 50, 74);
            margin: -20px -31px 10px;
            padding: 15px 30px;
            color: #fff;
        }
        .table-title h2 {
            margin: 2px 0 0;
            font-size: 24px;
        }
    </style>
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
                        <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6"><h4>Filter using applicant status if validated or not</h4></div>
                                <div class="col-sm-6">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-info active">
                                            <input type="radio" name="status" value="all" checked="checked"> All
                                        </label>
                                        <label class="btn btn-success">
                                            <input type="radio" name="status" value="Active"> Active
                                        </label>
                                        <label class="btn btn-danger">
                                            <input type="radio" name="status" value="Inactive"> Not active
                                        </label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="example" class="table table-bordered table-striped">
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
                            <tr @if($youth->status == 1)
                                        data-status="Active"
                                        @elseif($youth->status == 0)
                                        data-status="Inactive"
                                        @endif>
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
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>


@section('footerSection')
    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" ></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"> </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" ></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"> </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"> </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"> </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"> </script>
    <script>
        $(document).ready(function(){
            $(".btn-group .btn").click(function(){
                var inputValue = $(this).find("input").val();
                if(inputValue != 'all'){
                    var target = $('table tr[data-status="' + inputValue + '"]');
                    $("table tbody tr").not(target).hide();
                    target.fadeIn();
                } else {
                    $("table tbody tr").fadeIn();
                }
            });
            // Changing the class of status label to support Bootstrap 4
            var bs = $.fn.tooltip.Constructor.VERSION;
            var str = bs.split(".");
            if(str[0] == 4){
                $(".label").each(function(){
                    var classStr = $(this).attr("class");
                    var newClassStr = classStr.replace(/label/g, "badge");
                    $(this).removeAttr("class").addClass(newClassStr);
                });
            }
        });
        $(function () {
            var table = $('#example').DataTable({
                buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
            });
            table.buttons().container().appendTo( '#example_wrapper .col-sm-6:eq(0)' );
        })
    </script>
@endsection
@endsection
