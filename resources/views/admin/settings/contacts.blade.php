@extends('admin.layouts.app')
@section('main-content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->

        <section class="content-header">
            <h1>
                Contacts and addresses
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Update settings</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update settings</h3>
                        </div>
                        <!-- /.box-header -->
                    @include('includes.messages')
                    <!-- form start -->
                        <form role="form" method="post" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                            <div class="row">
                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <h3>Nairobi office</h3>
                                            <label>Primary tel</label>
                                            <input type="tel" class="form-control" name="nairobi_tel" value="{{ $nairobi_tel->value }}" required="required">
                                            <label>Mobile 1</label>
                                            <input type="tel" class="form-control" name="nairobi_mobile_1" value="{{ $nairobi_mobile_1->value }}" required="required">
                                            <label>Mobile 2</label>
                                            <input type="tel" class="form-control" name="nairobi_mobile_2" value="{{ $nairobi_mobile_2->value }}" required="required">
                                            <label>Mobile 3</label>
                                            <input type="tel" class="form-control" name="nairobi_mobile_3" value="{{ $nairobi_mobile_3->value }}" required="required">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="nairobi_email" value="{{ $nairobi_email->value }}" required="required">
                                            <label>address</label>
                                            <input type="text" class="form-control" name="nairobi_address" value="{{ $nairobi_address->value }}" required="required">
                                            <label>Map url</label>
                                            <input type="url" class="form-control" name="nairobi_map_url" value="{{ $nairobi_map_url->value }}" required="required">
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Webuye Factory</h3>
                                            <label>Primary tel</label>
                                            <input type="tel" class="form-control" name="webuye_tel" value="{{ $webuye_tel->value }}" required="required">
                                            <label>Mobile 1</label>
                                            <input type="tel" class="form-control" name="webuye_mobile_1" value="{{ $webuye_mobile_1->value }}" required="required">
                                            <label>Mobile 2</label>
                                            <input type="tel" class="form-control" name="webuye_mobile_2" value="{{ $webuye_mobile_2->value }}" required="required">
                                            <label>Mobile 3</label>
                                            <input type="tel" class="form-control" name="webuye_mobile_3" value="{{ $webuye_mobile_3->value }}" required="required">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="webuye_email" value="{{ $webuye_email->value }}" required="required">
                                            <label>address</label>
                                            <input type="text" class="form-control" name="webuye_address" value="{{ $webuye_address->value }}" required="required">
                                            <label>Map url</label>
                                            <input type="url" class="form-control" name="webuye_map_url" value="{{ $webuye_map_url->value }}" required="required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
