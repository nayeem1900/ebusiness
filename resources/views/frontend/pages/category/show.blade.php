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
                    <h3>AL Products in <span class="badge badge-info">{{$category->name}}</span>Category</h3>
                    @php $products=$category->products()->paginate(9);
                    @endphp

                    @if($products->count() >0)

                    @include('frontend.pages.product.all-product')
                        @else
                    <div class="alert alert-warning">
                        No Products has a create in this category

                    </div>
                        @endif
                </div>

                <div class="widget">

                </div>


            </div>

        </div>

    </div>
@endsection


{{--End Sidebar+content--}}