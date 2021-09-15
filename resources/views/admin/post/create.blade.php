@extends('admin.layouts.app')
@section('main-content')
@section('headSection')
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
        <!-- Main content -->

        <section class="content-header">
            <h1>
                Insights
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('post.index') }}"><i class="fa fa-dashboard"></i> Posts</a></li>
                <li class="active">Create new</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add post</h3>
                        </div>
                        <!-- /.box-header -->
                    @include('includes.messages')
                    <!-- form start -->
                        <form role="form" method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="row">
                                            <div class="container">
                                                <div class="col-md-6">
                                                    <label for="name">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title" placeholder="eg Market trends 2021" value="{{ old('title') }}" required="required">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="name">Sub paragraph</label>
                                                    <input type="text" class="form-control" id="header" name="subtitle" placeholder="eg Appears in homepage" value="{{ old('subtitle') }}" required="required">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="container">
                                               <div class="col-md-12">
                                                   <label for="subtitle" style="margin-top: 20px;">Description</label>
                                                   <textarea name="body" id="editor1" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; visibility: hidden; display: none;" >
                                                      {{ old('body') }}
                                                   </textarea>

                                                   <div class="form-group" style="margin-top: 20px;">
                                                       <img src="{{ asset('noimage.jpg') }}"  alt="User Image" id="preview" height="120px" width="150px" onchange="previewImage(this)">
                                                   </div>

                                                   <div class="form-group">
                                                       <div class="file">
                                                           <label for="avatar" class="btn bg-navy btn-flat"><span class="fa fa-upload"></span> Browse post image</label>
                                                           <input type="file" name="image" accept="image/*" class="form-control" id="image" required="required">
                                                       </div>
                                                   </div>

                                                   <div class="form-group">
                                                       <div class="checkbox">
                                                           <label>
                                                               <input type="checkbox" value="1" name="status"
                                                                         @if(old('status')==1)
                                                                           checked
                                                                         @endif>
                                                               Publish this post
                                                           </label>
                                                       </div>
                                                   </div>
                                               </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('post.index') }}">Back</a>
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function(){
            readURL(this);
        });
    </script>
@endsection
@endsection
