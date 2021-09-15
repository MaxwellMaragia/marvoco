@extends('admin.layouts.app')
@section('main-content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->

        <section class="content-header">
            <h1>
                About us page settings
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
                        <form role="form" method="post" action="{{ route('about.store') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group">
                                        <label for="name">About us page title</label>
                                        <textarea name="about_header" id="" cols="30" rows="10" class="form-control">{{ $about_header->value }}</textarea>

                                    </div>

                                    <div class="form-group">
                                        <label for="name">About us page content</label>
                                        <textarea name="about_text" id="" cols="30" rows="10" class="form-control">{{ $about_text->value }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Mission</label>
                                        <textarea name="mission" id="" cols="30" rows="10" class="form-control">{{ $mission->value }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Mission image</label>
                                        <input type="file" class="form-control" name="mission_image" accept="image/*">
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
