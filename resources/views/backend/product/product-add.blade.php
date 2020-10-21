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

                                @if(isset($editData))
                                    <h3> Edit Product
                                        @else
                                            Add Product
                                        @endif

                                        <a class="btn btn-success float-right btn-sm" href="{{route('product.view')}}"><i class="fa fa-list"></i>Product List</a>
                                    </h3>


                            </div><!-- /.card-header -->
                            <div class="card-body" >



                                <form method="POST" action="{{(@$editData)?route('product.update',$editData->id):route('product.store')}}" id="myForm" enctype="multipart/form-data"  >
                                    @csrf
                                    @include('backend.layouts.message')


                                   <div class="row">
                                       <div class="form-group col-md-4 ">
                                           <label>Title</label>

                                               <input type="text" name="title" value="{{@$editData->title}}" class="form-control"id="title">


                                       </div>

                                       <div class="form-group col-md-4 ">
                                           <label>Description</label>

                                               <input type="text" name="description" value="{{@$editData->description}}" class="form-control"id="description">

                                       </div>
                                       <div class="form-group col-md-4 ">
                                           <label>Price</label>

                                               <input type="number" name="price" value="{{@$editData->price}}" class="form-control"id="price">


                                       </div>
                                       <div class="form-group col-md-4 ">
                                           <label>Quantity</label>

                                               <input type="number" name="quantity" value="{{@$editData->quantity}}" class="form-control"id="quantity">


                                       </div>
                                       <div class="row">

                                               <div class="form-group col-md-4 ">
                                                   <label>Product Image</label>

                                                   <input type="file" name="product_image[]" value="" class="form-control"id="product_image">


                                               </div>

                                           <div class="form-group col-md-4 ">
                                               <label>Product Image</label>

                                               <input type="file" name="product_image[]" value="" class="form-control"id="name">


                                           </div>
                                           <div class="form-group col-md-4 ">
                                               <label>Product Image</label>

                                               <input type="file" name="product_image[]" value="" class="form-control"id="name">


                                           </div>
                                           <div class="form-group col-md-4 ">
                                               <label>Product Image</label>

                                               <input type="file" name="product_image[]" value="" class="form-control"id="name">


                                           </div>
                                           <div class="form-group col-md-4 ">
                                               <label>Product Image</label>

                                               <input type="file" name="product_image[]" value="" class="form-control"id="name">


                                           </div>







                                       </div>


                                   </div>




                                    <div class="form-group col-md-6"style="padding-top:30px;">
                                        <button type="submit" class="btn btn-primary btn-sm">

                                            {{(@$editData)?'Update':'Submit'}}

                                        </button>

                                    </div>
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

