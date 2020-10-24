@extends('frontend.layouts.master')

{{--Start Sidebar+ content--}}

@section('content')
    <div class="container margin-top-20">

        <div class="row">

            <div class="col-md-4">
                @include('frontend.layouts.partial.product-sidebar')

            </div>

            <div class="col-md-8">
                <div class="widget">
                    <h3>All Products</h3>
                    @include('frontend.pages.product.all-product')

                </div>

                <div class="widget">

                </div>


            </div>

        </div>

    </div>
    @endsection


{{--End Sidebar+content--}}