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
                                <h3>Category List
                                    <a class="btn btn-success btn-sm float-right" href="{{route('category.create')}}"><i class="fa fa-plus-circle"></i>Add Category</a>
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                @include('backend.layouts.message')

                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th> #</th>
                                        <th>Category Name</th>
                                        <th>Parent Category</th>
                                        <th>Category Image</th>

                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($categories as $category)
                                            <td>#</td>
                                            <td>{{$category->name}}</td>

                                            <td>

                                                @if($category->parent_id == NULL)
                                                    Primary Category
                                                @else
                                                    {{$category->parent->name}}

                                                @endif
                                            </td>
                                            <td><img src="{!!asset('images/categories/' .$category->image)!!}" width="50"></td>


                                            <td>
                                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-outline-primary">Edit</a>
                                                <a href="#deleteModal{{$category->id}}" data-toggle="modal" class="btn btn-warning">Delete</a>

                                                <!-- Delete modal -->


                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are You Sure Delete</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('category.delete',$category->id)}}" method="post">
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

