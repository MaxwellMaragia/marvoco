@extends('admin.layouts.app')

@section('main-content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Add chemical
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('chemicals.index') }}"><i class="fa fa-dashboard"></i> Chemicals</a></li>
                <li>Create chemical</li>
            </ol>
        </section>


        <div class="margin-10px-top"></div>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Fields marked with (<span class="text-danger">*</span>) are required</h3>
                        </div>


                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('chemicals.store') }}" method="post" >
                            {{ csrf_field() }}
                            <div class="box-body">
                                @include('includes.messages')
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="title">Category<span class="text-danger">*</span></label>
                                        <select name="category" id="category" class="form-control" required="required">
                                            <option value="">Select category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Product name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="product" placeholder="Name of product" required="required" value="{{ old('product') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Specification<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="specification" placeholder="Specification" required="required" value="{{ old('specification') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Packaging<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="packaging" placeholder="Packaging" required="required" value="{{ old('packaging') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">CAS<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="cas" placeholder="CAS" required="required" value="{{ old('cas') }}">
                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('chemicals.index') }}">Back</a>
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#avatar").change(function(){
            readURL(this);
        });
    </script>
@endsection
