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

    th{
        background-color: white;
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: #f9f9f9;

    }

    .table-striped>tbody>tr:nth-of-type(even) {
        background-color: white;
    }

    .table-container {
        position: relative;
        top: 15px;
    }

    .dataTables_filter, .dataTables_info { display: none; }

    input#myInput {
        float: right;
        height: 34px;
        text-align: center;
    }
</style>
<button type="button" class="btn-add" data-toggle="modal" data-target="#myModal">Add New Store</button>
<input type="text" id="myInput" placeholder="Search Branch">
<div class="table-container">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Store</th>
    <th>Branch</th>
</tr>
</thead>
<tbody>
<tr>
    <td>Tiger Nixon</td>
    <td>System Architect</td>
    <td>Edinburgh</td>
    <td>61</td>
    <td>Edinburgh</td>
    <td>61</td>
</tr>


</tbody>
</table>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <div class ="col-md-4">
                        <div class="field-container">
                            <input type="text" class="field" required placeholder="First name"/>
                            <label class="floating-label">FIRST NAME</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="field-container">
                            <input type="text" class="field" required placeholder="Last name"/>
                            <label class="floating-label">LAST NAME</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="field-container">
                            <input type="text" class="field" required placeholder="Phone Number"/>
                            <label class="floating-label">PHONE NUMBER</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                </div>
                <div class="row customize-row22">
                    <div class ="col-md-4">
                        <div class="field-container">
                            <input type="text" class="field" required placeholder="Store name"/>
                            <label class="floating-label">STORE NAME</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="field-container">
                            <input type="text" class="field" required placeholder="Branch"/>
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
                            <input type="text" class="field" required placeholder="Email"/>
                            <label class="floating-label">EMAIL</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="field-container">
                            <input type="password" class="field" required placeholder="Password"/>
                            <label class="floating-label">PASSWORD</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                    <div class ="col-md-4">
                        <div class="field-container">
                            <input type="password" class="field" required placeholder="Confirm Password"/>
                            <label class="floating-label">CONFIRM PASSWORD</label>
                            <div class="field-underline"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="customize-btn" data-dismiss="modal">Close</button>
                <button type="button" class="customize-btn">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function() {

        LoadUserDatatable()

    } );

    function LoadUserDatatable(){

        $('#example').DataTable().destroy();
        var table = $('#example').DataTable({
            "bLengthChange": false,
            "pageLength": 11,
            "serverSide": false,
            "ajax": "user-ajax",
            "columns": [
                {data: 'firstname', name: 'First Name'},
                {data: 'lastname', name: 'Last Name'},
                {data: 'email', name: 'Email'},
                {data: 'phonenumber', name: 'Phone Number'},
                {data: 'store', name: 'Store'},
                {data: 'branch', name: 'Branch'}
            ]
        });

        $('#myInput').on( 'keyup', function () {
            table.search( this.value ).draw();
        } );

    }

</script>