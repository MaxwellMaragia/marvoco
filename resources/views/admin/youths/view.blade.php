@extends('admin.layouts.app')

@section('main-content')
@section('headSection')
    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
    <style>
        .file {
            position: relative;
            height: 35px;
        }

        .file > input[type="file"] {
            position: absolute;
            opacity: 0;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0
        }


    </style>
@endsection


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Register youth
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('youth.index') }}"><i class="fa fa-dashboard"></i> youths</a></li>
            <li>{{ $youth->names }}</li>
        </ol>
    </section>


    <div class="margin-10px-top"></div>
    <!-- Main content -->
    <section class="content">
        <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div class="col-md-8">
                        <table class="table table-bordered table-stripped">
                            <tr>
                                <td><b>Names</b></td>
                                <td>{{ $youth->names }}</td>
                            </tr>
                            <tr>
                                <td><b>Identification</b></td>
                                <td>{{ $youth->identification }}</td>
                            </tr>
                            <tr>
                                <td><b>Gender</b></td>
                                <td>{{ $youth->gender }}</td>
                            </tr>
                            <tr>
                                <td><b>Date of birth</b></td>
                                <td>{{ $youth->dob }}</td>
                            </tr>
                            <tr>
                                <td><b>Mobile</b></td>
                                <td>{{ $youth->mobile }}</td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td>{{ $youth->email }}</td>
                            </tr>
                            <tr>
                                <td><b>Ward</b></td>
                                <td>{{ $youth->ward }}</td>
                            </tr>
                            <tr>
                                <td><b>Physical address</b></td>
                                <td>{{ $youth->physical_address }}</td>
                            </tr>
                            <tr>
                                <td><b>Health condition</b></td>
                                <td>{{ $youth->health_condition ?? "N/A"}}</td>
                            </tr>
                            <tr>
                                <td><b>Drug abuse history</b></td>
                                <td>{{ $youth->drug_abuse ?? "N/A" }}</td>
                            </tr>
                            <tr>
                                <td><b>Next of kin names</b> : {{ $youth->next_of_kin_names }}</td>
                            </tr>
                            <tr>
                                <td><b>Next of kin relationship</b> : {{ $youth->next_of_kin_relationship }}</td>
                            </tr>
                            <tr>
                                <td><b>Next of kin contacts</b> : {{ $youth->next_of_kin_contacts }}</td>
                            </tr>
                            <tr>
                                <td><b>Resume/CV</b></td>
                                <td>
                                    <a href="{{ route('download', $youth->id) }}" class="btn btn-info"><span class="fa fa-file"></span> Download</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection
