<style>
    .modal {
        text-align: center;
        padding: 0!important;
    }

    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px;
    }

    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
    }

    .modal-content {
        background: #1a1a1a !important;
        border: 0;
        border-radius: 0;
    }

    .close {
       color:white;
    }

    .modal-header {
        border-bottom: 1px solid transparent !important;
    }

    .modal-footer {
        border-top: 1px solid transparent !important;
        text-align: center;
        padding-top: 92px;
    }


    .field-container {
        position: relative;
        width: 181px;
        font-family: 'Roboto', sans-serif;
    }
    .field {
        display: block;
        width: 100%;
        padding: 15px 3px 0;
        border: none;
        font-size: 12px;
        background: transparent;
        border-bottom: 1px solid #333333;
        color: #8a8686;
    }
    .field:focus {
        outline: 0;
    }
    .floating-label {
        position:absolute;
        pointer-events:none;
        top: 5px;
        left:10px;
        font-size: 10px;
        opacity:0;
        background-color: transparent;
        padding: 0 2px;
        -webkit-transition: 0.2s ease-in-out;
        transition: 0.2s ease-in-out;
    }
    .field:valid + .floating-label {
        opacity: 1;
        top: -5px;
        left: 0;
        color: #9e9e9e;
    }
    .field:focus + .floating-label {
        color: #2c3e50 ;
    }

    .field-underline {
        position:absolute;
        top:0;
        left:0;
        right:0;
        bottom:-5px;
        border:1px solid white;
        z-index: -1;
        padding:10px 10px 0;
    }
    .field:focus + .floating-label + .field-underline {
        border-color:#2c3e50 ;
    }

    .customize-row1{
        position: relative;
        top: 14px;
    }

    .customize-row1-datatable{
        position: relative;
        top: 14px;
        margin:auto;
    }

    .customize-row2{
        position: relative;
        top: 20px;
    }

    .customize-row22 {
        position: relative;
        top: 33px;
    }

    .customize-row3{
        position: relative;
        top: 59px;
    }

    .customize-row4{
        position: relative;
        top: 61px;
    }

    .customize-btn {
        background: #2c3e50 ;
        color: white;
        border: none;
        width: 99px;
        height: 30px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .btn-add{
        color: black;
        background: #ffffff;
        border: none;
        width: 156px;
        height: 37px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }



    input#myInput {
        float: right;
        height: 34px;
        text-align: center;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        border:0;
    }

    #user_table tbody tr td:nth-child(6),#user_table thead tr th:nth-child(6){
        text-align: center;
        width: 50px !important;
    }

    .glyphicon{
        padding: 0px 5px;
        cursor: pointer;
    }
    .glyphicon.edit{
        color: #337ab6;
    }
    .glyphicon.delete{
        color: red;
    }

</style>
<h4>Manage Users</h4>
<button type="button" class="btn-add" data-toggle="modal" data-target="#myModal">Add New Store User</button>
<input type="text" id="myInput" placeholder="Search Branch">
<div class="table-container">
<table id="user_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone Number</th>

    <th>Branch</th>
    <th>Action</th>
</tr>
</thead>
</table>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">New Store Details</h4>
            </div>
            <div class="modal-body">
                <div class="row customize-row1">
                    <div class ="col-md-12">
                        <div class="field-container">
                            <p style="color:white">Store Information</p>
                        </div>
                    </div>
                </div>
                <div class="row customize-row2">
                    <div class ="col-md-6">
                        <div class="field-container">
                            <input type="text" class="field" id="first_name" required placeholder="First name"/>
                            <label class="floating-label">FIRST NAME</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                    <div class ="col-md-6">
                        <div class="field-container">
                            <input type="text" class="field" id="last_name" required placeholder="Last name"/>
                            <label class="floating-label">LAST NAME</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>

                </div>
                <div class="row customize-row22">
                    <div class ="col-md-6">
                        <div class="field-container">
                            <input type="text" class="field" id="contact" required placeholder="Phone Number"/>
                            <label class="floating-label">PHONE NUMBER</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                    <div class ="col-md-6">
                        <div class="field-container">

                            <select class="field" id="branch_id">
                                <option selected disabled>Choose branch</option>
                                @foreach($branch as $key => $val)
                                    <option value="{{ $val->id }}">{{ $val->branch_name }}</option>
                                @endforeach
                            </select>
                            <label class="floating-label">BRANCH</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                </div>
                <div class="row customize-row3">
                    <div class ="col-md-12">
                        <div class="field-container">
                            <p style="color:white">Login Details</p>
                        </div>
                    </div>
                </div>
                <div class="row customize-row4">
                    <div class ="col-md-4">
                        <div class="field-container">
                            <input type="text" class="field" id="email" required placeholder="Email"/>
                            <label class="floating-label" >EMAIL</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="field-container">
                            <input type="password" class="field" id="password" required placeholder="Password"/>
                            <label class="floating-label">PASSWORD</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="field-container">
                            <input type="password" class="field" id="conf_pass" required placeholder="Confirm Password"/>
                            <label class="floating-label">CONFIRM PASSWORD</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="customize-btn " data-dismiss="modal">Close</button>
                <button type="button" class="customize-btn add-user">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {
        var BASEURL = $('#baseURL').val();
        LoadUserDatatable(BASEURL);

        $('body').delegate('.edit','click',function(){

        });

        $('body').delegate('.add-user','click',function(){
            var prod_id = $(this).attr('data-id')

            var first_name = $('#first_name').val()
            var last_name = $('#last_name').val()
            var contact = $('#contact').val()
            var email = $('#email').val()
            var password = $('#password').val()
            var conf_pass = $('#conf_pass').val()
            var branch_id = $('#branch_id').val()

            if(conf_pass != password){
                swal('','Password mismatched','error');
            }else{
                swal({
                    title: "Are you sure?",
                    text: "You want to add this product?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },function(isConfirm){
                    if(isConfirm){

                        var BASEURL = $('#baseURL').val();
                        $.ajax({
                            url:BASEURL+'/addUser',
                            type:'POST',
                            data:{
                                '_token': $('meta[name="csrf_token"]').attr('content'),
                                'first_name':first_name,
                                'last_name':last_name,
                                'contact':contact,
                                'email':email,
                                'password':password,
                                'branch_id':branch_id
                            },
                            success: function(id){
                                swal("Succes!", "User has been added.", "success");
                                $('#myModal').modal('hide');
                                var users = $('#user_table').DataTable();
                                users.ajax.reload();

                                addUser(id,branch_id,first_name+' '+last_name)


                            }
                        });

                    }else{
                        swal("", "Cancelled", "success");
                    }
                });
            }

        });

    } );

    function LoadUserDatatable(ajaxUrl){

        var table = $('#user_table').DataTable({
            "bLengthChange": false,
            "pageLength": 11,
            "serverSide": false,
            "ajax": ajaxUrl+'/loadUser',
            "columns": [
                {data: 'first_name'},
                {data: 'last_name'},
                {data: 'email'},
                {data: 'contact'},
                {data: 'branch'},
                {data: 'action'}
            ]
        });

        $('#user_table_filter').remove();

        $('#myInput').on( 'keyup', function () {
            table.search( this.value ).draw();
        } );

    }


    function addUser(user_id,branch_id,user){
        //get value of message
        var date = new Date();

        var newPostKey = firebase.database().ref().child('chat-list').push().key;
        //add attributes to object messages
        firebase.database().ref('users/'+ user_id).set({
            active_time: ''+date,
            branch_id: branch_id,
            user: user,
            status: 0
        });
    }


    //New error event handling has been added in Datatables v1.10.5
    $.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) {
        console.log(message);
        var users = $('#user_table').DataTable();
        users.ajax.reload();
    };


</script>