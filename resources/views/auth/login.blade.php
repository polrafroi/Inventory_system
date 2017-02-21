
<style>

    /*GLOBAL CSS*/

    body {
        background: #2c3e50 !important;
    }

    .navbar-default {
        background-color: transparent !important;
        border-color: transparent !important;
    }

    .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
        color: white !important;
        background-color: transparent;
    }

    .navbar-default .navbar-nav>li>a, .navbar-default .navbar-text {
        color: white !important;
        text-align: center;
    }

    .navbar-default .navbar-brand {
        color: white !important;
    }

    .navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:hover {
        color: white !important;
        background-color: transparent;
    }

    /*END GLOBAL CSS*/

    .container-login {
        display: table;
        height: 85%;
        width: 100%;
    }
        .inner-container-login {
            display: table-cell;
            vertical-align: middle;
        }

            .body-container {
                margin: auto;
            }
                .img-logo-company {
                    height: 151px;
                    width: 324px;
                    border: 1px solid;
                    margin: auto;
                }

                .container-form {
                    margin: auto;
                    width: 296px;
                    margin-top: 37px;
                }
                    .customize-input{
                        text-align: center;
                        background-color: #2c3e50 !important;
                        color: white !important;
                        border: none !important;
                        border-bottom: 1px solid white !important;
                        border-radius: 0px !important;
                        box-shadow: 0 0 0 0px !important;
                    }

                    .center {
                       text-align: center;
                    }

                     button.btn.btn-primary.customize-button{
                         background: #c0392b;
                         border: none;
                         width: 327px;
                    }

</style>
@extends('layouts.app')

@section('content')
  <div class="container-login">
    <div class="inner-container-login">
        <div class="body-container">
            <div class="img-logo-company"></div>
            <div class="container-form">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control customize-input" name="email" value="{{ old('email') }}" placeholder="Username" required autofocus>
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control customize-input" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group center">
                        <button type="submit" class="btn btn-primary customize-button">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
  </div>
@endsection
