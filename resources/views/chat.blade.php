<style>
    .message-container {
        height: 350px;
        width: 500px;
        border: 1px solid black;
        position: relative;
        padding: 0px 5px;
        overflow: auto;
    }

    ul{
        margin: 0;
        padding: 0;

    }

    ul li{
        padding: 10px;
        list-style-type: none;
    }

    .receive-message img,.sent-message img{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid black;
    }

    .col-md-2 img{
        text-align: left;
    }

    .receive-message .col-md-10,.sent-message .col-md-10{
        padding: 10px;

        background-color: #578dc8;
        color: white;
        border-radius: 10px;
    }


    .receive-message p,.sent-message p{
        word-wrap: break-word;
        text-align: justify;
    }


</style>
<div class="username">

</div>

<input type="text" class="username" value="{{ Auth::user()->email }}">
<input type="text" class="password" value="password">


<div class='wrap'>
    <div class='content'>
        <div class="chat-container">
            <div class="chat-body">
                <ul id="object_li">

                </ul>
            </div>
            <div class="send-btns">
                <input type="text" id = "message" value="">
                <button type="button" class="btn btn-primary" id="click-btn">SEND</button>
            </div>
        </div>
    </div>

    <div class="message-container">
        <ul>
            <li>
                <div class="container-fluid">
                    <div class="row">
                        <div class="receive-message">
                            <div class="col-md-2 text-left">
                                <img src="">
                            </div>
                            <div class="col-md-10">
                                <p> * initApp handles setting up UI event listeners and registering Firebase auth listeners:
                                    *  - firebase.auth().onAuthStateChanged: This listener is called when the user is signed in or
                                    *    out, and that is where we update the UI.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
<!--            <li>-->
<!--                <div class="row">-->
<!--                    <div class="sent-message">-->
<!---->
<!--                        <div class="col-md-10">-->
<!--                            <p> * initApp handles setting up UI event listeners and registering Firebase auth listeners:-->
<!--                                *  - firebase.auth().onAuthStateChanged: This listener is called when the user is signed in or-->
<!--                                *    out, and that is where we update the UI.</p>-->
<!--                        </div>-->
<!--                        <div class="col-md-2">-->
<!--                            <img src="">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
        </ul>
    </div>

</div>


<script>
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyBKIcISCayW6LZNJrqKS7-reS0l3wekj3o",
        authDomain: "mcoat-chat.firebaseapp.com",
        databaseURL: "https://mcoat-chat.firebaseio.com",
        storageBucket: "mcoat-chat.appspot.com",
        messagingSenderId: "132380463520"
    };
    firebase.initializeApp(config);

    //Query messages in realtime database
    const dbRefObject = firebase.database().ref('messages');

    //on child added in list
    dbRefObject.on('child_added', function (snap) {
//        $('#object_li').append($('<li>' + snap.val().message +'</li>'))

        $('.message-container ul').append(
            $('<li>' +
                '<div class="container-fluid">' +
                    '<div class="row">' +
                        '<div class="receive-message">' +
                            '<div class="col-md-2">' +
                                '<img src="">' +
                            '</div>' +
                            '<div class="col-md-10">' +
                                '<p>' + snap.val().message + '</p>' +
                            ' </div>' +
                            '</div>' +
                    '</div>' +
                '</div>' +
            ' </li>' +
            ''
        ))
    });

    $('#click-btn').on('click',function(){
        displayAdd()
        $('.message-container').animate({scrollTop:$(document).height()}, 'slow');
    });


    //Function Comment
    function displayAdd(){
        //get value of message
        var message = $('#message').val();
        //get new key
        var newPostKey = firebase.database().ref().child('messages').push().key;
        //add attributes to object messages
        firebase.database().ref('messages/' + newPostKey).set({
            user_id: 1,
            user_img: 'wew',
            message: message
        });

    }


</script>