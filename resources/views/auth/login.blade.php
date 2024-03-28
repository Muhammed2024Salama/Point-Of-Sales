@extends('layouts.Backend.master2')

@section('title')
    LogIn - P.O.S
@stop


@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ asset('Backend/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
          rel="stylesheet">
@endsection
@section('content')
    <section class="height-100vh d-flex align-items-center page-section-ptb login"
             style="background-image: url('{{ asset('Backend/assets/admin/images/login-bg.jpeg') }}');">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                     style="background-image: url('{{ asset('Backend/assets/admin/images/login-inner-bg.jpeg') }}');">
                    <div class="login-fancy">
                        <h2 class="text-white mb-20">Hello world!</h2>
                        <p class="mb-20 text-white">Point Of Sales</p>
                        <ul class="list-unstyled  pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a></li>
                            <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 class="mb-30">Sign In To Admin</h3>
                        <div class="section-field mb-20">
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <label class="mb-10" for="name">email* </label>
                                <input id="email" class="web form-control" type="email" autofocus
                                       value="{{old('email')}}" require placeholder="email" name="email">
                        </div>
                        <div class="section-field mb-20">
                            <label class="mb-10" for="Password">Password* </label>
                            <input id="password" class="Password form-control" type="password" placeholder="Password"
                                   name="password" required autocomplete="current-password"/>
                        </div>
                        <div class="section-field">
                            <div class="remember-checkbox mb-30">
                                <input id="two" type="checkbox" class="form-control" name="remember">
                                <label for="two"> Remember me</label>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="float-right">Forgot Password?</a>
                        @endif
                        <button type="submit" class="button">
                            <span>Log in</span>
                            <i class="fa fa-check"></i>
                        </button>

                        <p class="mt-20 mb-0">Don't have an account? <a href="{{route('register')}}"> Create one
                                here</a></p>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
