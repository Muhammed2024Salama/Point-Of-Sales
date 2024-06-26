@extends('layouts.Backend.master2')

@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
                <div class="col-lg-6">
                    <h1 class="h2 text-uppercase mb-0">{{ __('Register') }}</h1>
                </div>
                <div class="col-lg-6 text-lg-right">

                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="row">
            <div class="col-6 offset-3">
                <h2 class="h5 text-uppercase mb-4">{{ __('Register') }}</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-small text-uppercase" for="name">First Name</label>
                                <input class="form-control form-control-lg" name="name" type="text"
                                       value="{{ old('name') }}" placeholder="Enter your name">
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-small text-uppercase" for="email">E-mail Address</label>
                                <input class="form-control form-control-lg" name="email" type="email"
                                       value="{{ old('email') }}" placeholder="Enter your email address">
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-small text-uppercase" for="password">Password</label>
                                <input class="form-control form-control-lg" name="password" type="password"
                                       placeholder="Enter your password">
                                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="text-small text-uppercase" for="password_confirmation">Password</label>
                                <input class="form-control form-control-lg" name="password_confirmation" type="password"
                                       placeholder="Re type your password">
                                @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-dark" type="submit">{{ __('Register') }}</button>

                                @if (Route::has('login'))
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Have an account?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
