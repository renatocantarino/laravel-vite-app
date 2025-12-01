@extends('layouts.app')

@section('content')
   <div id="page-content" class="page-content" style="margin-top: -25px">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url({{asset('assets/img/bg-header.jpg')}});">
                <div class="container">
                    <h1 class="pt-5">
                        Login Page
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>

                    <div class="card card-login mb-5">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                      <input id="email" type="email" placeholder="enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                      @error('email')
                                         <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                         </span>
                                      @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                    @if (Route::has('password.request'))
                                      <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                      </a>
                                @endif
                                    </div>
                                </div>
                                <div class="form-group row text-center mt-4">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Log In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
