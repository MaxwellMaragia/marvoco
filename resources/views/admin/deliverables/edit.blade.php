@extends('admin.layouts.app')
@section('main-content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
         <!-- Main content -->
        <section class="content-header">
            <h1>
                deliverables
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('deliverables.index') }}"><i class="fa fa-dashboard"></i> deliverables</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update deliverable</h3>
                        </div>
                        <!-- /.box-header -->
                       @include('includes.messages')
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('deliverables.update',$deliverable->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="box-body">
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group">
                                        <img src='{{ Storage::url($deliverable->icon) }}' height="60px;"><br>
                                        <label for="name">Icon (svg file)</label>
                                        <input type="file" class="form-control" id="header" name="icon" accept="image/svg+xml">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control" id="header" name="title" required="required" value="{{ $deliverable->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Description</label>
                                        <input type="text" class="form-control" id="header" name="description" required="required" value="{{ $deliverable->description }}">
                                    </div>
                                </div>

                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('deliverables.index') }}">Back</a>
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

@section('footerSection')
    <!-- CK Editor -->
    <script src="{{ asset('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
    <script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection
@endsection
