<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Ecommerce')
    </title>
    @include('frontend.layouts.partial.style')
</head>
<body>

<div class="wrapper">
    {{--Navbar--}}

   @include('frontend.layouts.partial.nav')
    {{--End Nav Bar--}}

@yield('content')

   @include('frontend.layouts.partial.footer')



</div>


@include('frontend.layouts.partial.script')
</body>
</html>