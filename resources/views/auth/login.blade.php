@extends('layouts.master-without-nav')

@section('title') Login @endsection

@section('body')

<body>
    @endsection

    @section('content')

        <div class="form-body without-side">
            <div class="website-logo">
                <div class="">
                    <img style="
                        margin-top:50px;
                        margin-left:-35px;
                        width:180px;
                        " src="images/site-icon-white.png" alt="">
                </div>
            </div>
            <div class="row">
                <div class="img-holder">
                    <div class="bg"></div>
                    <div class="info-holder">
                        <img class="mb-4" src="images/graphic3.svg" alt="">
                    </div>
                </div>
                <div class="form-holder">
                    <div class="form-content">
                        <div class="form-items">
                            <h3>Welcome to My Educate!</h3>
                            <p>Sign in to Educate Tutoring</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" @if (old('email')) value="{{ old('email') }}" @else placeholder="Email" @endif required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="input-group-append">
                                            <button id="show_password" class="btn btn-secondary" type="button"
                                                onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-button">
                                        <button id="login" type="submit" class=" ibtn"
                                            {{ __('Login') }}>Login</button>
                                        {{-- <a href="{{ route('password.request') }}">Forget password?</a> --}}
                                    </div>
                                </div>

                            </form>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-btn d-none d-sm-block">
            <a href="{{ URL::previous() }}" class="text-dark"><i class='bx bxs-left-arrow-square h1'
                    style="color:#fff"></i></a>
        </div>
        <span class="colombia text">
            <script>
                document.write(new Date().getFullYear())
            </script> Educate Tutoring. Design with <i class="mdi mdi-heart text-primary"></i> by Kameku Creative and
            Nettic - Colombia
        </span>
        </div>

        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('libs/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('libs/metismenu/metismenu.min.js') }}"></script>
        <script src="{{ URL::asset('libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ URL::asset('libs/node-waves/node-waves.min.js') }}"></script>
        <script src="{{ URL::asset('js/app.min.js') }}"></script>

        <script type="text/javascript">
            function mostrarPassword() {
                var cambio = document.getElementById("password");
                if (cambio.type == "password") {
                    cambio.type = "text";
                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                } else {
                    cambio.type = "password";
                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            }

            $(document).ready(function() {
                //CheckBox mostrar contraseña
                $('#ShowPassword').click(function() {
                    $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
                });
            });
        </script>
    @endsection

    
