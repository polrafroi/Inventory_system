<style>

    .wrap {
        position: absolute;
        overflow: hidden;
        top: 10%;
        right: 10%;
        bottom: 73px;
        left: 62%;
        padding: 5px 8px;
        display: block;
        border-radius: 4px;
        transform: translateY(20px);
        transition: all 0.5s;
        visibility: hidden;
    }
    .wrap .content {
        opacity: 0;
    }
    .wrap:before {
        position: absolute;
        width: 1px;
        height: 1px;
        background: white;
        content: "";
        bottom: 10px;
        left: 50%;
        top: 95%;
        color: #fff;
        border-radius: 50%;
        -webkit-transition: all 600ms cubic-bezier(0.215, 0.61, 0.355, 1);
        transition: all 600ms cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    .wrap.active {
        display: block;
        visibility: visible;
        box-shadow: 2px 3px 16px silver;
        transition: all 600ms;
        transform: translateY(0px);
        transition: all 0.5s;
    }
    .wrap.active:before {
        height: 2000px;
        width: 2000px;
        border-radius: 50%;
        top: 50%;
        left: 50%;
        margin-left: -1000px;
        margin-top: -1000px;
        display: block;
        -webkit-transition: all 600ms cubic-bezier(0.215, 0.61, 0.355, 1);
        transition: all 600ms cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    .wrap.active .content {
        position: relative;
        z-index: 1;
        opacity: 1;
        transition: all 600ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
    }

    a.button {
        padding: 11px 11px 13px 13px;
        outline: none;
        border-radius: 50%;
        background: #007fed;
        color: #fff;
        font-size: 24px;
        display: block;
        position: fixed;
        left: 93%;
        bottom: 20px;
        top: auto;
        margin-left: -25px;
        transition: transform 0.25s;
    }
    a.button:hover {
        text-decoration: none;
        background: #2198ff;
    }
    a.button.active {
        transform: rotate(135deg);
        transition: transform 0.5s;
    }

.chat-body {
    position: relative;
    /* top: 70px; */
    overflow-y: auto;
    overflow-x: hidden;
    height: 430px;
}
.chat-body ul {
    list-style: none;
    padding: 15px;
    margin: 0;
}
.chat-body ul li {
    display: flex;
    position: relative;
    margin:5px 0;
}
.user-img{
    width: 40px;
    height: 40px;
    background: #fff;
    border-radius: 50%;
    border: 1px solid;
    position: absolute;
    line-height: 39px;
    /*top: 25px;*/
    text-align: center;
    left:8px;
    bottom:0;
}

.col-md-2 {height: 100%; position: relative;}
.base-receive .user-img {left:0;}
.base-receive,.base-send {width:100%;}
.base-receive .col-md-10 {padding-left:0;padding-right: 0;}
.base-send .col-md-10 {padding-left:0;padding-right:0;margin:0;}
.message-box,.message-box-send {
    /*width: 210px;*/
    float: left;
}
.message-box-send {float:right;}
.message-box p,.message-box-send p {
    padding: 10px;
    color:#213444;
    background: #cecece;
    border-radius: 10px;
    font-size:13px;
}
.message-box-send p{background: #f1575e;color:#fff}
.base-receive .col-md-10::before {
    width: 0;
    height: 0;
    content: "";
    position: absolute;
    left: -8px;
    bottom: 9px;
    border-bottom: 10px solid #cecece;
    border-left: 15px solid transparent;
    transform: rotate(-12deg);
    -ms-transform: rotate(-12deg); /* IE 9 */
    -webkit-transform: rotate(-12deg); /* Chrome, Safari, Opera */
}
.base-send .col-md-10::after {
    width: 0;
    height: 0;
    content: "";
    position: absolute;
    right: -8px;
    bottom: 9px;
    border-bottom: 10px solid #f1575e;
    border-right: 15px solid transparent;
    transform: rotate(12deg);
    -ms-transform: rotate(12deg); /* IE 9 */
    -webkit-transform: rotate(12deg); /* Chrome, Safari, Opera */
}
.chat-receive {
    position: absolute;
}

.send-btns {
    position: relative;
    top: 14px;
}

input#message {
    width: 244px;
    height: 34px;
 }

    button#click-btn {
        width: 116px;
    }
</style>
<input type="hidden" value="{{ $name }}" id = "user_name"">
<input type="hidden" value="{{ $user_id }}" id = "user_id" ">




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
</div>
<a class='button glyphicon glyphicon-plus' href='#'></a>

<script src="https://www.gstatic.com/firebasejs/3.6.10/firebase.js"></script>
<script>

    $('a').on('click', function(){
        $('.wrap, a').toggleClass('active');

        return false;
    });
    // Initialize Firebase
    var config = {
        apiKey: "AIzaSyBiRdjGgIaDeJzSGQJql2smUs6_jshjpRI",
        authDomain: "samplerealtime-e5367.firebaseapp.com",
        databaseURL: "https://samplerealtime-e5367.firebaseio.com",
        storageBucket: "samplerealtime-e5367.appspot.com",
        messagingSenderId: "655054402077"
    };
    firebase.initializeApp(config);

    document.getElementById("click-btn").addEventListener("click", displayAdd);

    //get id of List
    const refObjectli = document.getElementById('object_li')



    //get value of user id and name
    var user_id = document.getElementById('user_id').value
    var user_name = document.getElementById('user_name').value

    //Query messages in realtime database
    const dbRefObject = firebase.database().ref('messages');

    //on child added in list
    dbRefObject.on('child_added', function (snap) {

    //create element
    const li = document.createElement('li');
    const innerDiv = document.createElement("div");
    const colmd10 = document.createElement("div");
    const colmd2 = document.createElement("div");
    const divmessagebox = document.createElement("div");
    const messages = document.createElement("p");
    const userimg = document.createElement("div");

    //appendChild
    refObjectli.appendChild(li);
    li.appendChild(innerDiv);
    innerDiv.appendChild(colmd10)
    innerDiv.appendChild(colmd2)
    divmessagebox.appendChild(messages)

    //set attribute

    if (user_id == snap.val().user_id) {

        li.setAttribute('class','chat-send')
        innerDiv.setAttribute("class", "base-send");
        colmd10.setAttribute("class", "col-md-10");
        colmd2.setAttribute("class", "col-md-2");
        divmessagebox.setAttribute("class", "message-box-send")
        colmd10.appendChild(divmessagebox)
        colmd2.appendChild(userimg)

    }else{

        li.setAttribute('class','chat-receive')
        innerDiv.setAttribute("class", "base-receive");
        colmd10.setAttribute("class", "col-md-2");
        colmd2.setAttribute("class", "col-md-10");
        divmessagebox.setAttribute("class", "message-box")
        colmd10.appendChild(userimg)
        colmd2.appendChild(divmessagebox)

    }

       messages.setAttribute("class", "messages")
       messages.innerText = snap.val().message;
       userimg.setAttribute("class", "user-img")
       userimg.innerText = snap.val().user_img

    });


    //Function Comment
    function displayAdd(){


        //get value of message
        var message = document.getElementById('message').value


        //get new key
        var newPostKey = firebase.database().ref().child('messages').push().key;

        //add attributes to object messages
        firebase.database().ref('messages/' + newPostKey).set({
            user_id: user_id,
            user_img: user_name,
            message: message
        });

    }

</script>


