<!DOCTYPE html>
<html lang="en">

@include('layouts.Backend.head')

<body>

<div class="wrapper">

    <!--=================================
     preloader -->

    <div id="pre-loader">
        <img src="{{ asset('Backend/assets/images/pre-loader/loader-01.svg') }}" alt="">
    </div>

    <!--=================================
     preloader -->


    @include('layouts.Backend.main-header')

    <!--=================================
     Main content -->

    <div class="container-fluid">
        <div class="row">

            @include('layouts.Backend.main-sidebar')

            <!--=================================
           wrapper -->

            <div class="content-wrapper">

                @yield('content')

                <!--=================================
                 wrapper -->

                <!--=================================
                 footer -->

                @include('layouts.Backend.main-footer')

            </div><!-- main content wrapper end-->
        </div>
    </div>
</div>

<!--=================================
 footer -->


<!--=================================
 jquery -->

@include('layouts.Backend.main-script')

</body>
</html>
