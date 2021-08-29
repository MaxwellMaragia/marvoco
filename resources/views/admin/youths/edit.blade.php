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
               Update youth
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('youth.index') }}"><i class="fa fa-dashboard"></i> youths</a></li>
                <li>Update {{ $youth->names }}'s details</li>
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
                        <form role="form" action="{{ route('youth.update',$youth->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="box-body">
                                @include('includes.messages')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Names<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" name="names" placeholder="Enter full names" required="required" value="{{ $youth->names }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Identification number<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="subtitle" name="identification" placeholder="Enter identification or passport" required="required" value="{{ $youth->identification }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Mobile<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="subtitle" name="mobile" placeholder="Enter mobile number" required="required" value="{{ $youth->mobile }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Ward<span class="text-danger">*</span></label>
                                        <select name="ward" id="ward" class="form-control" required="required">
                                            @foreach($wards as $ward)
                                            <option value="{{ $ward->name }}"
                                                @if($ward->name == $youth->ward)
                                                    selected
                                                @endif
                                                >
                                                {{ $ward->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="drug">Health condition</label>
                                        <textarea name="health" id="health" cols="30" rows="3"
                                                  class="form-control" placeholder="Please type in any health issues that have been faced">
                                            {{ $youth->health_condition }}
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Next of kin names<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="subtitle" name="next_of_kin_names" placeholder="Enter full names of next of kin" required="required" value="{{ $youth->next_of_kin_names }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Next of kin contacts<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="subtitle" name="next_of_kin_contacts" placeholder="Enter mobile or email of next of kin" required="required" value="{{ $youth->next_of_kin_contacts }}">
                                    </div>


                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" name="status" value="1"
                                                    @if($youth->status == 1)
                                                    checked
                                                @endif
                                            > Set details as verified by ticking checkbox
                                        </label>
                                    </div>

                                </div>



                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="title">Gender<span class="text-danger">*</span></label>
                                        <select name="gender" id="gender" class="form-control" required="required">
                                        @if($youth->gender == 'Male')
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        @elseif($youth->gender == 'Female')
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                            <option value="Other">Other</option>
                                        @elseif($youth->gender == 'Other')
                                            <option value="Other">Other</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        @endif
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Date of birth<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="subtitle" name="dob" placeholder="Enter date of birth"  value="{{ $youth->dob }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="subtitle" name="email" placeholder="Enter email" required="required" value="{{ $youth->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Physical address<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="subtitle" name="physical_address" placeholder="Enter physical address" required="required" value="{{ $youth->physical_address }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="drug">Drug abuse history</label>
                                        <textarea name="drugs" id="drugs" cols="30" rows="3"
                                                  class="form-control" placeholder="List of drugs used and if still using">
                                            {{ $youth->drug_abuse }}
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Next of kin relationship<span class="text-danger">*</span></label>
                                        <select name="next_of_kin_relationship" id="next_of_kin_relationship"
                                                class="form-control" required="required">
                                            <option value="{{ $youth->next_of_kin_relationship }}">{{ $youth->next_of_kin_relationship }}</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Father">Father</option>
                                            <option value="Wife">Wife</option>
                                            <option value="Husband">Husband</option>
                                            <option value="Brother">Brother</option>
                                            <option value="Sister">Sister</option>
                                            <option value="Son">Son</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Cousin">Cousin</option>
                                            <option value="Nephew">Nephew</option>
                                            <option value="Niece">Niece</option>
                                            <option value="Uncle">Uncle</option>
                                            <option value="Aunt">Aunt</option>
                                            <option value="Grandmother">Grandmother</option>
                                            <option value="Grandfather">Grandfather</option>
                                            <option value="Granddaughter">Granddaughter</option>
                                            <option value="Grandson">Grandson</option>
                                            <option value="Friend">Friend</option>
                                            <option value="House help">House help</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitle">Upload resume (pdf)<span class="text-danger">If existing is ok ignore</span></label>
                                        <input type="file" class="form-control"  name="resume" accept="application/pdf" >
                                    </div>
                                </div>

                        
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-warning" href="{{ route('youth.index') }}">Back</a>
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
