@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">


                                    <h3>

                                            Add Category


                                        <a class="btn btn-success float-right btn-sm" href="{{route('category.index')}}"><i class="fa fa-list"></i>Category List</a>
                                    </h3>


                            </div><!-- /.card-header -->
                            <div class="card-body" >



                                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @include('backend.layouts.message')
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Title" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>

                                        <textarea name="description" rows="8" cols="80" class="form-control" placeholder="write description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Parent Category(Optional)</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="">Please select a Parent category</option>
                                            @foreach($main_categories as $category)
                                                <option value="{{$category->id}}"> {{$category->name}} </option>
                                            @endforeach
                                        </select>

                                    </div>



                                    <div class="form-group">
                                        <label for="image">Category Image(Optional)</label>

                                        <input type="file" class="form-control" name="image" id="image" placeholder="Insert Image" ></div>




                                    <button type="submit" class="btn btn-primary">Save Category</button>
                                </form>



                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DIRECT CHAT -->

                        <!--/.direct-chat -->

                        <!-- TO DO List -->

                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script type="text/javascript">
        $(document).ready(function () {


            $('#myForm').validate({
                rules: {
                    "title": {
                        required: true,
                    },
                    "description": {
                        required: true,
                    },
                    "price": {
                        required: true,

                    },
                    "quantity": {
                        required: true,

                    }



                },

                messages: {


                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

@endsection

