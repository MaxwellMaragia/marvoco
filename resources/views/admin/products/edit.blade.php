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
            Update premier products
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('products.index') }}"><i class="fa fa-dashboard"></i>Premier products</a></li>
            <li>Edit premier product</li>
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
                    <form role="form" action="{{ route('products.update',$product->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="box-body">
                            @include('includes.messages')
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <img src="{{ Storage::url($product->image) }}"  alt="User Image" id="preview" height="125px" width="125px" onchange="previewImage(this)">
                                </div>

                                <div class="form-group">
                                    <div class="file">
                                        <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> product image</label>
                                        <input type="file" name="image" accept="image/*" class="form-control" id="avatar">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="title">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="name" placeholder="product name" required="required" value="{{ $product->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required="required" value="{{ $product->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="subtitle">Description</label>
                                    <textarea name="description" id="editor1" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; visibility: hidden; display: none;">
                                         {{ $product->description }}
                                    </textarea>
                                </div>


                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-warning" href="{{ route('products.index') }}">Back</a>
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
