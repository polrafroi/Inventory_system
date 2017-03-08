
<style>

    /*GLOBAL CSS*/

    body {
        background: #ffffff!important;
    }

    .navbar-default {
        background-color: transparent !important;
        border-color: transparent !important;
    }

    .navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
        background-color: transparent;
    }

    .navbar-default .navbar-nav>li>a, .navbar-default .navbar-text {
        text-align: center;
    }

    .navbar-default .navbar-brand {

    }

    .navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:hover {
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
                    height: 75px;
                    width: 168px;
                    border: 1px solid;
                    margin: auto;
                    position: relative;
                    bottom: 33px;
                }

                .bdre2 {
                    border-bottom: 2px solid #999;
                    height: 1px;
                    margin: 6px auto;
                    width: 100px;
                    margin-bottom: 30px;
                }

                .title {
                    font-size: 26px;
                    color: #393939;
                    margin: auto;
                    text-align: center;
                    font-weight: 300;
                }

                .title2 {
                    font-size: 18px;
                    font-weight: 300; 
                    margin-bottom: 20px;
                    margin-top: 10px;
                    color: #666;
                    text-align: center;
                }

                .container-form {
                    margin: auto;
                    width: 296px;
                }
                    .customize-input{
                        border-radius: 0 !important;
                        margin: auto;
                        width: 308px !important;
                    }

                    .center {
                       text-align: center;
                    }

                     button.btn.btn-primary.customize-button{
                         background: #ecf0f1;
                         border: none;
                         width: 308px !important;
                         color: white;
                         background-color: #e64226;
                         position: relative;
                         top: 29px;
                         height: 40px;
                    }

</style>
@extends('layouts.app')

@section('content')
  <div class="container-login">
    <div class="inner-container-login">
        <div class="body-container">
            <div class="img-logo-company"></div>
            <div class="title">One account. Access all services.</div>
            <div class="bdre2"></div>
            <div class="title2">Sign In to access Accounts</div>
            <div class="container-form">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control customize-input" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
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
                        <button type="submit" class="btn btn-primary customize-button" id="quickstart-sign-in">
                            Sign In
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
  </div>
@endsection



