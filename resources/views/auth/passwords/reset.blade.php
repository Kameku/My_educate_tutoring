@extends('layouts.master-without-nav')


@section('body')

    <body>
       
    @endsection


    @section('content')
        <div class="home-btn d-none d-sm-block">
            <a href="{{ route('dashboard.index') }}" class="btn btn-info waves-effect waves-light">
                <span>Login</span>
            </a>
        </div>
        <section class="my-5 pt-sm-5">
            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <div class="home-wrapper">

                            <div class="mb-5">
                                <img src="{{ URL::asset('images/educate.png') }}" alt="logo" height="55" />

                            </div>

                            <div class="card">
                                <div class="card-header bg-primary text-white font-size-15">{{ __('Reset Password') }}</div>
                
                                <div class="card-body">
                
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
                
                                        <input type="hidden" name="token" value="{{ $token }}">
                
                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror " readonly name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                
                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Reset Password') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
