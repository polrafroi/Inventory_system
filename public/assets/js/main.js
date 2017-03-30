
$(document).ready(function () {


    runEmoji();
    initFireBase();
    getEmojis()


    $('.chat-list .chat-body').slideToggle(300, 'swing');
    $('.chat-list .chat-header').on('click', function() {
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

        if(isSame == false && ctr <=4 ){

            $('.user-chat-list-container .chat-container-list').append($('<li class="chat-list1">' +
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
                '<ul class="user-message"></ul>' +
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

            createRoom($(this).data('id'),$('#user_id').val());

        }


    });

    $('body').delegate('.remove-user','click',function(){
        $(this).parents('li').remove();
    })

    $('body').delegate('#btn-chat','click',function(){
        var chat_room = $(this).parents().parents().find('.user-message').attr('data-chat_room');
        var user_id = $('#user_id').val();
        var message = $('#message').val();

        sendMessage(chat_room,user_id,message);

    });




//-----------------------------------------------
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function () {
        hamburger_cross();
    });



    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });

    function hamburger_cross() {

        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }




});



function initFireBase(){
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyBKIcISCayW6LZNJrqKS7-reS0l3wekj3o",
        authDomain: "mcoat-chat.firebaseapp.com",
        databaseURL: "https://mcoat-chat.firebaseio.com",
        storageBucket: "mcoat-chat.appspot.com",
        messagingSenderId: "132380463520",
        storageBucket: 'gs://mcoat-chat.appspot.com'
    };
    firebase.initializeApp(config);


    displayChatList();

    changeStatus($('#user_id').val());
//    getEmojis();



}

function changeStatus(user_id){
    var  dbRefObject = firebase.database().ref('users/'+user_id);
    var date = new Date();
    dbRefObject.update({
        status: 1
    });

}

function displayChatList(){

    var user_list  = firebase.database().ref('users');
    user_list.on('child_added',function(snap){

        if($('#user_id').val() != snap.key ){
            var status = (snap.val().status == 1) ? 'online' : 'offline';
            $('.user-list').append($('<li class="'+ status +'" data-id='+ snap.key +'>' +
                '<div class="row">' +
                '<div class="col-md-2">' +
                '<img src="">' +
                '</div>' +
                '<div class="col-md-10 user-name">' +
                ''+ snap.val().user +
                '</div>' +
                '</div>' +
                '</li>'));
        }
    });
}


function createRoom(user_id,current_user){

    var room_list  = firebase.database().ref('chat-list');
    room_list.on('value',function(data){
        var exist = false;
        var getKey = '';
        data.forEach(function(dataChild){

            if(arrayCompare(dataChild.val().user_id,[parseInt(user_id),parseInt(current_user)])){
                exist = true;
                getKey = dataChild.key
                return true;
            }

        });

        if(!exist){

            var newPostKey = firebase.database().ref().child('messages').push().key;
            var new_room  = firebase.database().ref('chat-list/'+newPostKey);
            new_room.set({
                user_id: [parseInt(current_user),parseInt(user_id)]
            });
            exist = true;

        }else{

            $('.user-chat-list-container .chat-container-list .chat-body .user-message').attr('data-chat_room',getKey)
            $('.user-chat-list-container .chat-container-list .chat-body .user-message li').remove()

            var getMessage = firebase.database().ref('chat-list/'+getKey+'/messages');
            getMessage.on('child_added',function(message){


                if(message.val().from_id == $('#user_id').val()){

                    $('.user-chat-list-container .chat-container-list .chat-body .user-message').append($('' +
                        ' <li class="message-sent">' +
                        '<div class="row">' +
                        ' <div class="col-md-9">' +
                        '<p>'+ message.val().message +'</p>' +
                        '</div>' +
                        ' <div class="col-md-3">' +
                        '  <img src="">' +
                        ' </div>' +
                        ' </div>' +
                        '</li>'));

                }else{
                    $('.user-chat-list-container .chat-container-list .chat-body .user-message').append($('' +
                        '<li class="message-receive">' +
                        ' <div class="row">' +
                        '<div class="col-md-3">' +
                        ' <img src="">' +
                        '  </div>' +
                        '  <div class="col-md-9">' +
                        '<p>'+ message.val().message +'</p>' +
                        ' </div>' +
                        ' </div>' +
                        '</li>'));
                }


            });



            $('.chat-list1 .chat-body').scrollTop($('.user-message li').last().position().top + $('.user-message li').last().height());

        }

    });


}

//Function Comment
function sendMessage(chat_room_id,user_id,message){
    //get value of message
    var date = new Date();
    var message = $('#message').val();

    var newPostKey = firebase.database().ref().child('chat-list').push().key;
    //add attributes to object messages
    firebase.database().ref('chat-list/'+ chat_room_id +'/messages/'+newPostKey).set({
        from_id: user_id,
        message: message
    });
    $('.chat-list1 .chat-body ').animate({ scrollTop: $('.chat-list1 .chat-body').prop("scrollHeight")}, 1);
}

function arrayCompare(a,b){
    return $(a).not(b).length === 0 && $(a).not(b).length === 0;
}


//function getEmojis(){
//
//    var emoji_list  = firebase.database().ref('emoji');
//    emoji_list.on('value',function(data){
//        data.forEach(function(dataChild){
//            var storage = firebase.storage().ref();
//            var storageRef = storage.child('emoji/'+ dataChild.val().emoji_name);
//
//            var image = storageRef.getDownloadURL().then(function(url){
//
//                $('.emoji-list').append($('<div> <img src="'+ url +'" > </div>'));
//
//            })
//        });
//
//    });
//
//}

function getEmojis(){
    var BASEURL = $('#baseURL').val();

    $.ajax({
        url:BASEURL+'/getEmojis',
        type:'POST',
        data:{
            '_token': $('meta[name="csrf_token"]').attr('content')
        },
        success: function(data){
            var json = JSON.parse(data)
           $(json['people']).each(function(index,val){

               $('.emoji-list').append($('<div>:'+val+':</div>'))
               runEmoji()
           })

        }
    });


}


function runEmoji(){
    var BASEURL = $('#baseURL').val();

    emojify.setConfig({

        emojify_tag_type : 'div',           // Only run emojify.js on this element
        only_crawl_id    : null,            // Use to restrict where emojify.js applies
        img_dir          : BASEURL+'/assets/emoji',  // Directory for emoji images
        ignored_tags     : {                // Ignore the following tags
            'SCRIPT'  : 1,
            'TEXTAREA': 1,
            'A'       : 1,
            'PRE'     : 1,
            'CODE'    : 1
        }
    });

    emojify.run();
}

