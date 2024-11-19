<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend/head')

</head>

<body > <!--class="animsition" -->

<!-- Header -->
@include('frontend/header')

<!-- Cart -->
@include('frontend/cart')

@yield('content')

@include('frontend/footer')

</body>
</html>
