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


                                <h3>

                                    Edit Product


                                    <a class="btn btn-success float-right btn-sm" href="{{route('product.index')}}"><i class="fa fa-list"></i>Product List</a>
                                </h3>


                            </div><!-- /.card-header -->
                            <div class="card-body" >



                                <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    @include('backend.layouts.message')
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" value="{{$product->title}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>

                                        <textarea name="description" rows="8" cols="80" class="form-control" value="{{$product->description}}"></textarea>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Category</label>
                                        <select class="form-control" name="category_id">
                                            <option value="">Please select a category for this Product</option>
                                            @foreach(App\Category::orderBy('name','asc')->where('parent_id', Null)->get() as $parent)
                                                <option value="{{$parent->id}}" {{$parent->id==$product->category->id ?'selected' : ''}}>{{$parent->name}}</option>

                                                @foreach(App\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child)
                                                    <option value="{{$child->id}}"{{$child->id==$product->category->id ?'selected' : ''}}>-------->{{$child->name}}</option>
                                                @endforeach


                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Select Brand</label>
                                        <select class="form-control" name="brand_id">
                                            <option value="">Please select a brand for this Product</option>
                                            @foreach(App\Brand::orderBy('name','asc')->get() as $br)
                                                <option value="{{$br->id}}" {{$br->id==$product->brand->id ?'selected' : ''}}>{{$br->name}}</option>



                                            @endforeach

                                        </select>
                                    </div>






                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Quantity</label>
                                        <input type="text" class="form-control" name="quantity" id="exampleInputEmail1" value="{{$product->quantity}}" a>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="text" class="form-control" name="price" id="exampleInputEmail1" value="{{$product->price}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="product_image">Product Image</label>

                                        <div class="row">
                                            <div class="col-md-4">

                                                <input type="file" class="form-control" name="product_image[]" id="product_image" placeholder="Insert Image" >
                                            </div>
                                            <div class="col-md-4">

                                                <input type="file" class="form-control" name="product_image[]" id="product_image" placeholder="Insert Image" >
                                            </div>
                                            <div class="col-md-4">

                                                <input type="file" class="form-control" name="product_image[]" id="product_image" placeholder="Insert Image" >
                                            </div>


                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Product</button>
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

