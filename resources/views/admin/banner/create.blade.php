@extends('admin.layouts.app')
@section('main-content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
         <!-- Main content -->

        <section class="content-header">
            <h1>
                Banners
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('banner.index') }}"><i class="fa fa-dashboard"></i> Banners</a></li>
                <li class="active">Create new</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add banner</h3>
                        </div>
                        <!-- /.box-header -->
                       @include('includes.messages')
                        <!-- form start -->
                        <form role="form" method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Title top</label>
                                        <input type="text" class="form-control" id="header" name="title_top" >
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Title bottom</label>
                                        <input type="text" class="form-control" id="header" name="title_bottom" >
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Subtitle</label>
                                        <input type="text" class="form-control" id="header" name="subtitle" >
                                    </div>

                                    <div class="form-group">
                                        <label for="button-text">Button text</label>
                                        <input type="text" class="form-control" id="button-text" name="button_text" placeholder="Button text">
                                    </div>

                                    <div class="form-group">
                                        <label for="button-url">Button url</label>
                                        <input type="url" class="form-control" id="button-url" name="url" placeholder="Link">
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Choose banner image</label>
                                        <input type="file" id="image" name="image">
                                    </div>
                                </div>

                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('banner.index') }}">Back</a>
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
