<style>
    .form-group{
        border: 1px solid black;
        padding: 20px 30px;
        margin: 0;
    }
    .form-group label{
        font-size: 12px;
    }

    .form-group .form-control,.form-group .btn{
        border-radius: 0;
        outline: 0;
        height: 27px;
        font-size: 12px;
    }
    .form-group .btn{
        height: 33px;
        margin-top: 5px !important;
    }

    .form-group .form-control:focus{
        box-shadow: none;
        outline: 0;
    }

    .list-table-container{
        padding-top: 20px;
    }

    td:focus {
        border: none;
        outline: none;
    }

    #search-table tbody tr{
        cursor: pointer;
    }

    .input-qty{
        padding-top: 30px;
    }

    .search{
        position: absolute;
        z-index: 999;
        left: -9999px;
        top: 107px;
        width: 100%;
    }
    .search-container{
        padding: 30px;
        margin: auto;
        background: white;
        border: 1px solid black;
        box-shadow: 5px 5px 10px #888888;
    }

    #search-product{
        margin-bottom: 10px;
    }

    .glyphicon-remove{
        cursor: pointer;
    }

    .location{
        padding-top: 25px;
    }

    .total-container{
        padding: 10px 0px 0px 0px;
        border: 1px solid red;
        font-size: 24px;
        font-weight: 700;
    }
    .total-container p{
        color: #000000;
    }
    .action-container{
        padding-top: 20px;
    }

    .action-container .col-md-12{
        padding: 0;
        margin: 0;

    }
    .action-container .col-md-12 button{
        width: 90%;
        margin-top: 5px;
    }

    .rec_no{
        margin-top: 5px;
    }
</style>
<div class="row">
    <div class="col-md-3">
        <form class="add-list" onsubmit="return false;">
            <input type="text" class="form-control" id="search-product" placeholder="Search ...">
            <div class="form-group">

                <input type="hidden" class="form-control" id="id">
                <label>Brand</label>
                <input type="text" class="form-control" id="brand" disabled>

                <label>Category</label>
                <input type="text" class="form-control" id="category" disabled>

                <label>Code</label>
                <input type="text" class="form-control" id="code" disabled>

                <label>Description</label>
                <input type="text" class="form-control" id="description" disabled>

                <label>Unit</label>
                <input type="text" class="form-control" id="unit" disabled>


                <label>Total Quantity</label>
                <input type="text" class="form-control" id="qty" disabled>

                <label>Unit Price</label>
                <input type="text" class="form-control" id="unit_price" disabled>

                <label class="input-qty" >Input quantity</label>
                <input type="text" class="form-control" id="input-qty" maxlength="10" disabled>

                <button type="button" class="btn btn-primary" id="add-list" style="width:100%;margin-top: 10px;" disabled>Add</button>
            </div>
        </form>
    </div>
    <div class="col-md-9">
        <div class="list-table-container">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="list-table" width="100%">
                <thead>
                <th>Id</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Code</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Action</th>
                </thead>
            </table>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="location">
                    <select class="form-control" id="location">
                        <option selected>Choose Supplier</option>
                        @foreach($supplier as $key => $val)
                        <option value="{{ $val->id }}">{{ $val->supplier_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <label></label>
                <input type="text" class="form-control rec_no" id="rec_no" placeholder="Receipt Number">
            </div>
            <div class="col-md-4">
                <div class="action-container">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="saveProductin">Save</button>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 search">
        <div class="search-container">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="search-table" width="100%">
                <thead>
                <th>Id</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Code</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Qty</th>
                <th>Unit Price</th>

                </thead>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    loadProduct();




    //remove search to create your own
    $('#search-table_filter input').unbind();
    $('#search-table_filter input').remove();
    $('#search-table_filter label').remove();

    $('#search-table_wrapper .dataTables_length').hide()

    $('#search-product').on('input', function(e) {
        var search_table = $('#search-table').DataTable();
        if($('#search-product').val().length > 0){
            $('.search').css('left','0');
            search_table.search( this.value ).draw();
        }else{
            $('.search').css('left','-9999px');
        }
    });

    $('#list-table').DataTable();


    $('body').delegate('#search-table tbody tr','dblclick',function(){

        $('#id').val($(this).children('td:nth-child(1)').text());
        $('#brand').val($(this).children('td:nth-child(2)').text());
        $('#category').val($(this).children('td:nth-child(3)').text());
        $('#code').val($(this).children('td:nth-child(4)').text())
        $('#description').val($(this).children('td:nth-child(5)').text());
        $('#unit').val($(this).children('td:nth-child(6)').text());
        $('#qty').val($(this).children('td:nth-child(7)').text());
        $('#unit_price').val($(this).children('td:nth-child(8)').text());
        $('#search-product').val('');
        $('.search').css('left','-9999px');
        $('#input-qty').attr('disabled',false);
        $('#add-list').attr('disabled',false);
        $('#input-qty').focus();
    });



    //text handling
    $('#input-qty').keypress(function (e) {
        if (String.fromCharCode(e.keyCode).match(/[^0-9]/g)) return false;
    });


    $('#add-list').on('click',function(){
        if($('#input-qty').val() != '' ){
            addToList();
        }else{
            swal('','Invalid quantity','error')
        }

    })

    $('body').delegate('.delete','click',function(){
        var dTable1 = $('#list-table').DataTable();
        var data = dTable1.rows().data()
        var isSame = false;
        var this_ = $(this)
        $(data).each(function(index,value){
            if(value[0] == this_.data('id')){
                $('#list-table').dataTable().fnDeleteRow(index);
            }
        });
    })


    $('#saveProductin').on('click',function(){
        var dTable1 = $('#list-table').DataTable();
        var data = dTable1.rows().data()
        var products = [];
        $(data).each(function(index,value){
            var arr =[];
            products.push({'product_id':  value[0],'product_qty': value[6]})
        });

        if($('#location').val() == 'Choose Supplier'){
            swal('','Please choose supplier','error')
        }else if($('#rec_no').val() == ''){
            swal('','Please input receipt number','error')
        }else{
            saveProductIn(products);
        }
    });

})

function loadProduct(){
    var BASEURL = $('#baseURL').val();
    $('#search-table').dataTable({
        ajax: BASEURL + '/loadProduct',
        columns:[
            {data: 'id'},
            {data: 'brand'},
            {data: 'category'},
            {data: 'code'},
            {data: 'description'},
            {data: 'unit'},
            {data: 'qty'},
            {data: 'unit_price' , bSortable: false}
        ],
        bDestroy: true,
        "order": []
    });


    var dTable1 = $('#list-table').DataTable()
    if(dTable1.data().count() == 0){
        $('#saveProductin').attr('disabled',true);
        $('#rec_no').attr('disabled',true);
        $('#location').attr('disabled',true);
    }
}

function addToList(){
    var dTable1 = $('#list-table').DataTable();
    var data = dTable1.rows().data()
    if(dTable1.data().count() != 0){
        var isSame = false;
        $(data).each(function(index,value){
            if($('#id').val() == value[0]){
                var oldqty = value[6];
                var newqty = parseInt(oldqty) + parseInt($('#input-qty').val());
                $('#list-table').dataTable().fnUpdate(newqty , index, 6 );
                isSame = true;
            }
        });

        if(!isSame){
            dTable1.row.add([
                $('#id').val(),
                $('#brand').val(),
                $('#category').val(),
                $('#code').val(),
                $('#description').val(),
                $('#unit').val(),
                $('#input-qty').val(),
                $('#unit_price').val(),
                '<i class="glyphicon glyphicon-remove delete" data-id="'+$('#id').val()+'"></i>'
            ]).draw();
        }

    }else{
        dTable1.row.add([
            $('#id').val(),
            $('#brand').val(),
            $('#category').val(),
            $('#code').val(),
            $('#description').val(),
            $('#unit').val(),
            $('#input-qty').val(),
            $('#unit_price').val(),
            '<i class="glyphicon glyphicon-remove delete" data-id="'+$('#id').val()+'"></i>'
        ]).draw();
    }

    $('#input-qty').attr('disabled',true);
    $('#add-list').attr('disabled',true);
    $('#search-product').focus();
    $('.add-list')[0].reset();

    $('#saveProductin').attr('disabled',false);
    $('#rec_no').attr('disabled',false);
    $('#location').attr('disabled',false);

    $('#list-table').dataTable().fnPageChange('last'); //This is not working
}

function saveProductIn(product){
    var BASEURL = $('#baseURL').val();

    swal({  title: "Are you sure?",
        text: "You want to Save this data.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: 'Okay',
        closeOnConfirm: false
    }, function(isConfirm){
        if(isConfirm){
            $.ajax({
                url:BASEURL+'/saveProductIn',
                type:'POST',
                data:{
                    '_token': $('meta[name="csrf_token"]').attr('content'),
                    'products': product,
                    'receipt_no': $('#rec_no').val(),
                    'supplier_id': $('#location').val()
                },
                success: function(data){
                    if(data == 'Data already exist'){
                        swal('',data,'error')
                    }else{
                        swal({
                            title: "",
                            text: "Product saved successfully",
                            type:"success"
                        },function(isConfirm){
                            if(isConfirm){
                                location.reload();
                                var search_table = $('#search-table').DataTable();
                                search_table.ajax.reload();
                            }
                        });
                    }
                }
            });
          }
    });
}



//New error event handling has been added in Datatables v1.10.5
$.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) {
    console.log(message);
    var search_table = $('#search-table').DataTable();
    var dTable1 = $('#list-table').DataTable();
    dTable1.ajax.reload(null,false); // reload table paging retained
    search_table.ajax.reload();
};



jQuery.fn.dataTable.Api.register( 'page.jumpToData()', function ( data, column ) {
    var pos = this.column(column, {order:'current'}).data().indexOf( data );
    if ( pos >= 0 ) {
        var page = Math.floor( pos / this.page.info().length );
        this.page( page ).draw( false );
    }

    return this;
} );


</script>