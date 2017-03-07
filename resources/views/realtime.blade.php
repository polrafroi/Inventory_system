<style>



    /* ---------- LIVE-CHAT ---------- */

    #live-chat {
        bottom: 0;
        font-size: 12px;
        right: 50px;
        position: fixed;
        width: 300px;
    }

    /*CUSTOMIZE MESSAGE*/
    .col-md-2, .col-md-10{
        padding:0;
    }
    .panel{
        margin-bottom: 0px;
    }
    .chat-window{
        bottom:0;
        position:fixed;
        float:right;
        margin-left:10px;
    }
    .chat-window > div > .panel{
        border-radius: 5px 5px 0 0;
    }
    .icon_minim{
        padding:2px 10px;
    }
    .msg_container_base{
        background: #e5e5e5;
        margin: 0;
        padding: 0 10px 10px;
        max-height:300px;
        overflow-x:hidden;
        height: 300px;
    }
    .top-bar {
        background: #666;
        color: white;
        padding: 10px;
        position: relative;
        overflow: hidden;
    }
    .msg_receive{
        padding-left:0;
        margin-left:0;
    }
    .msg_sent{
        padding-bottom:20px !important;
        margin-right:0;
    }
    .messages {
        background: white;
        padding: 10px;
        border-radius: 2px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        max-width:100%;
    }
    .messages > p {
        font-size: 13px;
        margin: 0 0 0.2rem 0;
    }
    .messages > time {
        font-size: 11px;
        color: #ccc;
    }
    .msg_container {
        padding: 10px;
        overflow: hidden;
        display: flex;
    }
    img {
        display: block;
        width: 100%;
    }
    .avatar {
        position: relative;
    }
    .base_receive > .avatar:after {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        height: 0;
        border: 5px solid #FFF;
        border-left-color: rgba(0, 0, 0, 0);
        border-bottom-color: rgba(0, 0, 0, 0);
    }

    .base_sent {
        justify-content: flex-end;
        align-items: flex-end;
    }
    .base_sent > .avatar:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 0;
        border: 5px solid white;
        border-right-color: transparent;
        border-top-color: transparent;
        box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
    }

    .msg_sent > time{
        float: right;
    }

    .msg_container_base::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    .msg_container_base::-webkit-scrollbar
    {
        width: 12px;
        background-color: #F5F5F5;
    }

    .msg_container_base::-webkit-scrollbar-thumb
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }

    .btn-group.dropup{
        position:fixed;
        left:0px;
        bottom:0;
    }

</style>


<input type="hidden" value="{{ $name }}" id = "name">
<input type="hidden" value="{{ $user_id }}" id = "user_id">
<input type="hidden" value="{{ $date }}" id = "date">

<input type="hidden" value="{{ $room_id }}" id = "room_id">
<ul>
    <li><a href="http://papersllc.com/realtimeDb/1">MCOAT</a></li>
    <li><a href="http://papersllc.com/realtimeDb/2">PASIG</a></li>
    <li><a href="http://papersllc.com/realtimeDb/3">DAGUPAN</a></li>
</ul>


<div id="live-chat">

    <div class="row chat-window col-xs-5 col-md-3" id="chat_window_1" style="margin-left:10px;">
        <div class="col-xs-12 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat Group</h3>
                    </div>
                </div>
                <div class="panel-body msg_container_base">

                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="message" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> <!-- end live-chat -->

<script>
    (function() {

        $('.panel-heading').on('click', function() {

            $('.panel-body').slideToggle(300, 'swing');
            $('.panel-footer').slideToggle(300, 'swing');

        });

    }) ();
</script>

<script>

    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyBiRdjGgIaDeJzSGQJql2smUs6_jshjpRI",
        authDomain: "samplerealtime-e5367.firebaseapp.com",
        databaseURL: "https://samplerealtime-e5367.firebaseio.com",
        storageBucket: "samplerealtime-e5367.appspot.com",
        messagingSenderId: "655054402077"
    };
    firebase.initializeApp(config);

    document.getElementById("btn-chat").addEventListener("click", displayAdd);

    //get id of List
    const refObjectli = document.getElementById('object_li')

    //get value of user id and name
    var user_id = document.getElementById('user_id').value
    var name = document.getElementById('name').value
    var date = document.getElementById('date').value

    //get id of case
    var value = document.getElementById('room_id').value;

    //Query messages in realtime database
    const dbRefObject = firebase.database().ref('messages').orderByChild('chat_room').equalTo(value);

    //on child added in list
    dbRefObject.on('child_added', function (snap) {


        if(snap.val().user_id == user_id){
            $('.msg_container_base').append(
                $('<div class="row msg_container base_sent">'+
                    '<div class="col-md-10 col-xs-10">'+
                    '<div class="messages msg_sent">'+
                    '<p>'+snap.val().message+'</p>'+
                    '<time>'+snap.val().user +' '+ timeSince(new Date(snap.val().date)) +' ago'+ '</time>'+
                    '</div>'+
                    '</div>'+
                    '<div class="col-md-2 col-xs-2 avatar">'+
                    '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
                    '</div>'+
                    '</div>'
                ))
        }else{
            $('.msg_container_base').append(
                $('<div class="row msg_container base_receive">'+
                    '<div class="col-md-2 col-xs-2 avatar">'+
                    '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">'+
                    '</div>'+
                    '<div class="col-md-10 col-xs-10">'+
                    '<div class="messages msg_receive">'+
                    '<p>'+snap.val().message+'</p>'+
                    '<time>'+snap.val().user +' '+ timeSince(new Date(snap.val().date)) +' ago'+ '</time>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
                ))
        }




    });

    var timeSince = function(date) {
        if (typeof date !== 'object') {
            date = new Date(date);
        }

        var seconds = Math.floor((new Date() - date) / 1000);
        var intervalType;

        var interval = Math.floor(seconds / 31536000);
        if (interval >= 1) {
            intervalType = 'year';
        } else {
            interval = Math.floor(seconds / 2592000);
            if (interval >= 1) {
                intervalType = 'month';
            } else {
                interval = Math.floor(seconds / 86400);
                if (interval >= 1) {
                    intervalType = 'day';
                } else {
                    interval = Math.floor(seconds / 3600);
                    if (interval >= 1) {
                        intervalType = "hour";
                    } else {
                        interval = Math.floor(seconds / 60);
                        if (interval >= 1) {
                            intervalType = "minute";
                        } else {
                            interval = seconds;
                            intervalType = "second";
                        }
                    }
                }
            }
        }

        if (interval > 1 || interval === 0) {
            intervalType += 's';
        }

        return interval + ' ' + intervalType;
    };


    //Function Comment
    function displayAdd(){


        $('.msg_container_base').animate({scrollTop: $('.msg_container_base').prop("scrollHeight")}, 500);

        //get value of message
        var message = document.getElementById('message').value


        //get new key
        var newPostKey = firebase.database().ref().child('messages').push().key;

        //add attributes to object messages
        firebase.database().ref('messages/' + newPostKey).set({
            user_id: user_id,
            chat_room: value,
            user: name,
            date: date,
            message: message
        });

    }

</script>