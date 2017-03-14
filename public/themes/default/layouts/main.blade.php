
<!DOCTYPE html>
<html>
<head>
    <title>{!! Theme::get('title') !!}</title>
    <meta charset="utf-8">
    <meta name="keywords" content="{!! Theme::get('keywords') !!}">
    <meta name="description" content="{!! Theme::get('description') !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    {!! Theme::asset()->styles() !!}
    {!! Theme::asset()->scripts() !!}
<style>

   .chat-list{
       position: fixed;
       right: 20px;
       bottom: 0;
       width: 220px;
       z-index: 999;
   }
   .chat-list .panel{
       margin-bottom: 0;
   }

   .chat-list .chat-header,.chat-footer{
       padding: 10px 0;
   }
   .chat-container .chat-header > .row{
       margin: 0;
   }

   .chat-list .chat-body{
       height: 245px;
       padding: 5px;
       overflow-y: auto;
       overflow-x: hidden;
    }

    .chat-list .chat-body .user-list{
        margin: 0;
        padding: 0;
    }
   .chat-list .chat-body .user-list li{
        list-style-type: none;
        padding: 10px 5px;
       margin: 2px 0;
       cursor: pointer;
       position: relative;
       line-height: 80%;
    }

   .chat-list .chat-body .user-list li.online:after,.chat-list .chat-body .user-list li.offline:after{
       content: '';
       width: 10px;
       height: 10px;
       position: absolute;
       top: 20px;
       right: 10px;
       border-radius: 50%;

   }

   .chat-list .chat-body .user-list li.online:after{
       background: green;
   }
   .chat-list .chat-body .user-list li.offline:after{
       background: red;
   }

   .chat-list .chat-body .user-list li .row .user-name{
       padding: 10px 0px 10px 20px;
   }

   .chat-list .chat-body .user-list li .row img{
       width: 30px;
       height: 30px;
       border-radius: 50%;
   }

   .chat-list .chat-body .user-list li:hover{
       background: #f4f4f4;

   }

   .user-chat-list{
       position: fixed;
       bottom: -5px;
       width: 100%;
   }

   .user-chat-list ul{
       display: block;
       padding: 0;
       margin: 0;
       float: right;

       margin-right: 250px;
   }
   .user-chat-list ul li{
        display: inline-block;
        list-style-type: none;
       width: 250px;
        background: #f4f4f4;
        margin: 0 2px;
       position: relative;


    }

   .user-chat-list ul > li > i {
       position: absolute;
       right: 10px;
       top: 15px;
   }

    .user-chat-list-container ul li .panel{
        margin-bottom: 0;
    }

   .user-chat-list-container ul li .chat-body{
       height: 200px;
       padding: 5px;
       overflow-y: auto;
       overflow-x: hidden;
   }






</style>
</head>

<body>
<input type="hidden" id="baseURL" value="{{ url('') }}" >
<div id="wrapper">


    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Lorem Ipsum
                </a>
            </li>
            <li>
                <a href="{{ URL::to('dashboard') }}"><i class="fa fa-fw fa-home"></i> Dashboard</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-shopping-cart"></i>Products<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Action</li>
                    <li><a href="{{ URL::to('manageproducts') }}">Manage Products</a></li>
                    <li><a href="#">Product In</a></li>
                    <li><a href="/productout">Product Out</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-line-chart"></i>Reports<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Action</li>
                    <li><a href="#">aa</a></li>
                    <li><a href="#">aa</a></li>
                    <li><a href="#">aa</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i>Users<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Action</li>
                    <li><a href="{{ URL::to('user') }}">Manage Users</a></li>
                    <li><a href="#">Change Password</a></li>
                </ul>
            </li>



        </ul>
    </nav>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
        </button>
        <div class="user-online">
            <div class="name-online">{!! Auth::user()->store_name.' '.'-'.' '.Auth::user()->firstname.' '.Auth::user()->lastname !!}</div>
            <div class="img-online">
                <img class="slide-image" src="http://placehold.it/1344x523" alt="">
            </div>
        </div>
        <div class="container">
            {!! Theme::content() !!}

            <div class="row">
                <div class="col-md-2 col-md-offset-10 ">

                </div>
            </div>
        </div>
    </div>

</div>



<div class="chat-list">
    <div class="chat-container">
        <div class="panel panel-default">
            <div class="panel-heading chat-header">
                <div class="row">
                    <div class="col-md-8">
                        Title
                    </div>
                    <div class="col-md-2 col-md-offset-2 closed">
                        <i class="glyphicon glyphicon-remove"></i>
                    </div>
                </div>
            </div>
            <div class="panel-body chat-body">
                <ul class="user-list">
                    <li class="online">
                       <div class="row">
                            <div class="col-md-2">
                                <img src="">
                            </div>
                           <div class="col-md-10 user-name">
                               March
                           </div>
                       </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="user-chat-list">
    <div class="user-chat-list-container">
        <ul>
<!--            <li class="chat-list1">-->
<!---->
<!--                    <div class="panel panel-default">-->
<!--                        <div class="panel-heading">-->
<!--                            <div class="row">-->
<!--                                <div class="col-md-8 user-name">-->
<!--                                    Title-->
<!--                                </div>-->
<!--                                <div class="col-md-2 col-md-offset-2">-->
<!--                                    <i class="glyphicon glyphicon-remove"></i>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="panel-body chat-body">-->
<!---->
<!--                        </div>-->
<!--                        <div class="panel-footer">-->
<!--                            <div class="input-group">-->
<!--                                <input id="message" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />-->
<!--                        <span class="input-group-btn">-->
<!--                        <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>-->
<!--                        </span>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--            </li>-->


        </ul>
    </div>
</div>

</body>
</html>
<script>

    $(document).ready(function(){

        initFireBase();


        $('.chat-list .chat-body').slideToggle(300, 'swing');
        $('.closed').on('click', function() {
            $('.chat-list .chat-body').slideToggle(300, 'swing');
        });

        $(".chat_input").on("input", function() {
            var g = $(this).val().toLowerCase();
            $(".chat-list li span").each(function() {
                var s = $(this).text().toLowerCase();
                $(this).closest('.chat-list li')[ s.indexOf(g) !== -1 ? 'show' : 'hide' ]();
            });
        });


        $('body').delegate('.user-list li','click',function(){
            var name = $(this);
            var isSame = false;
            var ctr = $('.user-chat-list-container ul li').length;
            $('.user-chat-list-container ul li').each(function(){

                if( $(this).find('.user-name').text().trim() == name.find('.user-name').text().trim()){
                    isSame = true;

                }

            })

            if(isSame == false && ctr <=3 ){

                 $('.user-chat-list-container ul').append($('<li>' +
                     '<div class="panel panel-default">' +
                         '<div class="panel-heading">' +
                             '<div class="row">' +
                                 '<div class="col-md-8 user-name">'+name.find('.user-name').text()+
                                    '' +
                                 '</div>' +
                                 ' <div class="col-md-2 col-md-offset-2">' +
                                    '<i class="glyphicon glyphicon-remove remove-user"></i>' +
                                 '</div>' +
                             '</div>' +
                         '</div>' +
                         '<div class="panel-body chat-body">' +
                         ' </div>' +
                         '<div class="panel-footer">' +
                             ' <div class="input-group">' +
                             '<input id="message" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />' +
                                 ' <span class="input-group-btn">' +
                                    '<button class="btn btn-primary btn-sm" id="btn-chat">Send</button>' +
                                 '</span>' +
                             '</div>' +
                         '</div>' +
                     '</div>'));
            }
        });

        $('body').delegate('.remove-user','click',function(){
            $(this).parents('li').remove();
        })

    });





    function initFireBase(){
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyBKIcISCayW6LZNJrqKS7-reS0l3wekj3o",
            authDomain: "mcoat-chat.firebaseapp.com",
            databaseURL: "https://mcoat-chat.firebaseio.com",
            storageBucket: "mcoat-chat.appspot.com",
            messagingSenderId: "132380463520"
        };
        firebase.initializeApp(config);

        displayChatList();
    }

    function displayChatList(){
        var user_list  = firebase.database().ref('users');

        user_list.on('child_added',function(snap){
            if($('#username').val() != snap.key ){
                var status = (snap.val().status == 1) ? 'online' : 'offline';
                $('.user-list').append($('<li class="'+ status +'" data-id='+ snap.key +'>' +
                    '<div class="row">' +
                        '<div class="col-md-2">' +
                            '<img src="">' +
                        '</div>' +
                        '<div class="col-md-10 user-name">' +
                             ''+ snap.val().branch_name +
                        '</div>' +
                    '</div>' +
                '</li>'));
            }
        });
    }



</script>

