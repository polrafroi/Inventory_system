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
    .chat-list li{
        background: #252b32;
        margin: 2px 0;
        padding: 20px;
        position: relative;

    }

    .chat-list li span{
        color: white;
    }
    .messages{
        height: 300px;
        border: 1px solid black;
    }

    .online::after{
        content: '';
        height: 10px;
        width: 10px;
        background: green;
        border-radius: 50%;
        position: absolute;
        right: 15px;
        top: 10px;
    }

    .offline::after{
        content: '';
        height: 10px;
        width: 10px;
        background: red;
        border-radius: 50%;
        position: absolute;
        right: 15px;
        top: 10px;
    }

    .friend-list{
        position: absolute;
        height: 350px;
        border: 1px solid black;
        width: 300px;
        top: 192px;
        left: 540px;
    }

</style>
<div class="username">

</div>

<input type="text" id="username" value='{{ Auth::user()->id }}'>
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
        <ul class="chat-list">
            <li class="status">
                <span>Branch Name</span>
            </li>



<!--            <li>-->
<!--                <div class="container-fluid">-->
<!--                    <div class="row">-->
<!--                        <div class="receive-message">-->
<!--                            <div class="col-md-2 text-left">-->
<!--                                <img src="">-->
<!--                            </div>-->
<!--                            <div class="col-md-10">-->
<!--                                <p> * initApp handles setting up UI event listeners and registering Firebase auth listeners:-->
<!--                                    *  - firebase.auth().onAuthStateChanged: This listener is called when the user is signed in or-->
<!--                                    *    out, and that is where we update the UI.-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
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


    <div class="friend-list">
        <ul >

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


    $('#click-btn').on('click',function(){
        displayAdd($('.friend-list ul').attr('data-chat_room'))

//        addBranch($('#username').val(),$('#message').val())

    });



    //Function Comment
    function displayAdd(chat_room_id){
        //get value of message
        var date = new Date();
        var message = $('#message').val();

        var newPostKey = firebase.database().ref().child('chat-list').push().key;
        //add attributes to object messages
        firebase.database().ref('chat-list/'+ chat_room_id +'/messages/'+newPostKey).set({
            from_id: '1',
            message: message
        });

    }

    displayChatList()

    function displayMessage(room_id){

        const dbRefObject = firebase.database().ref('chat-list/'+room_id+'/messages');
        dbRefObject.on('child_added', function (snap) {
            $('.list-messages').append($('<li> '+ snap.val().message +'</li>'))
        });
    }

    function addBranch(branch_id,branch_name){
        var  dbRefObject = firebase.database().ref('users/'+branch_id);
        var date = new Date();
        dbRefObject.set({
            branch_name: branch_name,
            status:0,
            active_time: ""+date
        });

    }
    function changeStatus(branch_id){
        var  dbRefObject = firebase.database().ref('users/'+branch_id);
        var date = new Date();
        dbRefObject.update({
            status:1
        });
    }

    $('body').delegate('.chat-list li','click',function(){

        getChatList($(this).data('id'),$('#username').val());

    })


    function getChatList(branch_id,current_user){

        var room_list  = firebase.database().ref('chat-list');
        room_list.on('value',function(data){
           var exist = false;
           var getKey = '';
           data.forEach(function(dataChild){

               if(arrayCompare(dataChild.val().user_id,[parseInt(branch_id),parseInt(current_user)])){
                   exist = true;
                   getKey = dataChild.key
                   return true;
               }

           });

            if(!exist){

                var newPostKey = firebase.database().ref().child('messages').push().key;
                var new_room  = firebase.database().ref('chat-list/'+newPostKey);
                new_room.set({
                    branch_id: branch_id,
                    user_id: [parseInt(current_user),parseInt(branch_id)]
                });
                exist = true;

            }else{

                $('.friend-list ul').attr('data-chat_room',getKey)
                $('.friend-list ul li').remove()

                var getMessage = firebase.database().ref('chat-list/'+getKey+'/messages');
                getMessage.on('child_added',function(message){

                    $('.friend-list ul').append($('<li>'+ message.val().message +'</li>'))

                });

            }

        });

    }

    function displayChatList(){
        var user_list  = firebase.database().ref('users');

        user_list.on('child_added',function(snap){
            if($('#username').val() != snap.key ){
                var status = (snap.val().status == 1) ? 'online' : 'offline';
                $('.chat-list').append($('<li class='+ status +' data-id='+ snap.key +'><span > '+ snap.val().branch_name +'</span></li>'));
            }
        });
    }



    function arrayCompare(a,b){
        return $(a).not(b).length === 0 && $(a).not(b).length === 0;
    }

</script>