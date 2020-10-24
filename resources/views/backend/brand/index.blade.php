@extends('backend.layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
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
                                <h3>Brand List
                                    <a class="btn btn-success btn-sm float-right" href="{{route('brand.create')}}"><i class="fa fa-plus-circle"></i>Add Brand</a>
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                @include('backend.layouts.message')

                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th> #</th>
                                        <th>Brand Name</th>
                                        <th>Brand Image</th>

                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($brands as $brand)
                                            <td>#</td>
                                            <td>{{$brand->name}}</td>

                                            <td><img src="{!!asset('images/brands/' .$brand->image)!!}" width="50"></td>


                                            <td>
                                                <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-outline-primary">Edit</a>
                                                <a href="#deleteModal{{$brand->id}}" data-toggle="modal" class="btn btn-warning">Delete</a>

                                                <!-- Delete modal -->


                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are You Sure Delete</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('brand.delete',$brand->id)}}" method="post">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger" >Permanent Delete</button>

                                                                </form>

                                                            </div>

                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>






                                    </tr>
                                    @endforeach
                                    </tbody>

                                </table>


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
@endsection

