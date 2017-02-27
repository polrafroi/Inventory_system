
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
                        <button type="submit" class="btn btn-primary customize-button" id="quickstart-sign-in">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
  </div>
@endsection

<script src="https://www.gstatic.com/firebasejs/3.6.10/firebase.js"></script>
<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyClqmVN085xGwVM07rJT4FpLMo3XUcEUZc",
        authDomain: "friendlychat-ba617.firebaseapp.com",
        databaseURL: "https://friendlychat-ba617.firebaseio.com",
        storageBucket: "friendlychat-ba617.appspot.com",
        messagingSenderId: "77330261855"
    };
    firebase.initializeApp(config);
</script>
<script type="text/javascript">


    function toggleSignIn() {
        if (firebase.auth().currentUser) {
            // [START signout]
            firebase.auth().signOut();
            // [END signout]
        } else {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            if (email.length < 4) {
                alert('Please enter an email address.');
                return;
            }
            if (password.length < 4) {
                alert('Please enter a password.');
                return;
            }
            // Sign in with email and pass.
            // [START authwithemail]
            firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
                // Handle Errors here.
                var errorCode = error.code;
                var errorMessage = error.message;
                // [START_EXCLUDE]
                if (errorCode === 'auth/wrong-password') {
                    alert('Wrong password.');
                } else {
                    alert(errorMessage);
                }
                console.log(error);

                // [END_EXCLUDE]
            });
            // [END authwithemail]
        }

    }


    function initApp() {
        // Listening for auth state changes.
        // [START authstatelistener]
        firebase.auth().onAuthStateChanged(function(user) {

            if (user) {
                // User is signed in.
                var displayName = user.displayName;
                var email = user.email;
                var emailVerified = user.emailVerified;
                var photoURL = user.photoURL;
                var isAnonymous = user.isAnonymous;
                var uid = user.uid;
                var providerData = user.providerData;
                // [START_EXCLUDE silent]
                document.getElementById('quickstart-sign-in-status').textContent = 'Signed in';
                document.getElementById('quickstart-sign-in').textContent = 'Sign out';
                document.getElementById('quickstart-account-details').textContent = JSON.stringify(user, null, '  ');

                alert('s')
            } else {
                // User is signed out.
                // [START_EXCLUDE silent]
                document.getElementById('quickstart-sign-in-status').textContent = 'Signed out';
                document.getElementById('quickstart-sign-in').textContent = 'Sign in';
                document.getElementById('quickstart-account-details').textContent = 'null';
                // [END_EXCLUDE]
                alert('s')
            }
            // [START_EXCLUDE silent]

            // [END_EXCLUDE]
        });
        // [END authstatelistener]

        document.getElementById('quickstart-sign-in').addEventListener('click', toggleSignIn, false);

    }

    window.onload = function() {
        initApp();
    };
</script>

