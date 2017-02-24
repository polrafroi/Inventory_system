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

    tbody tr{
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


</style>
<div class="row">
    <div class="col-md-3">
        <form class="add-list" onsubmit="return false;">
            <input type="text" class="form-control" id="search-product" placeholder="Search ...">
            <div class="form-group">

                <input type="hidden" class="form-control" id="id">
                <label>Brand</label>
                <input type="text" class="form-control" id="brand">

                <label>Category</label>
                <input type="text" class="form-control" id="category">

                <label>Code</label>
                <input type="text" class="form-control" id="code">

                <label>Description</label>
                <input type="text" class="form-control" id="description">

                <label>Unit</label>
                <select class="form-control" id="unit">
                    <option>Gal.</option>
                    <option>Ltr.</option>
                </select>

                <label>Total Quantity</label>
                <input type="text" class="form-control" id="qty">

                <label>Unit Price</label>
                <input type="text" class="form-control" id="unit_price">



                <label class="input-qty">Input quantity</label>
                <input type="text" class="form-control" id="input-qty">

                <button type="button" class="btn btn-primary" style="width:100%;margin-top: 10px;">Add</button>
            </div>
        </form>
    </div>
    <div class="col-md-9">
        <div class="list-table-container">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="list-table" width="100%">
                <thead>
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
            <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" class="btn btn-primary">Submit</button>
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
        loadDataList();
        var search_table = $('#search-table').DataTable();

        //remove search to create your own
        $('#search-table_filter input').unbind();
        $('#search-table_filter input').remove();
        $('#search-table_filter label').remove();

        $('#search-table_wrapper .dataTables_length').hide()

        $('#search-product').on('input', function(e) {

            if($('#search-product').val().length > 0){
                $('.search').css('left','0');
                search_table.search( this.value ).draw();
            }else{
                $('.search').css('left','-9999px');
            }
        });


        $('body').delegate('#search-table tbody tr','dblclick',function(){


            $('#id').val($(this).children('td:nth-child(1)').text())
            $('#brand').val($(this).children('td:nth-child(2)').text())
            $('#category').val($(this).children('td:nth-child(2)').text())
            $('#code').val($(this).children('td:nth-child(2)').text())
            $('#brand').val($(this).children('td:nth-child(2)').text())
            $('#description').val($(this).children('td:nth-child(2)').text())
            $('#unit').val($(this).children('td:nth-child(2)').text())
            $('#qty').val($(this).children('td:nth-child(2)').text())
            $('#unit_price').val($(this).children('td:nth-child(2)').text())
            $('#input-qty').focus();
            $('.search').css('left','-9999px');


        });


        $('#list-table').DataTable();

        $('.btn').on( 'click', function () {
            addtolist()
        });


    })

    function loadProduct(){
        var BASEURL = $('#baseURL').val();

        $('#search-table').DataTable({
            ajax: BASEURL + '/loadProduct',
            columns:[
                {data: 'id'},
                {data: 'brand'},
                {data: 'category'},
                {data: 'code'},
                {data: 'description'},
                {data: 'unit'},
                {data: 'qty'},
                {data: 'unit_price'}
            ],
            bDestroy: true,
            "order": []
        });
    }

    function addtolist(){
        var BASEURL = $('#baseURL').val();

        var dTable1 = $('#list-table').DataTable();
        $.ajax({
            url:BASEURL+'/addToList',
            type:'POST',
            data:{
                '_token': $('meta[name="csrf_token"]').attr('content'),
                'product_id':$('#id').val(),
                'qty':$('#input-qty').val()
            },
            success: function(data){
                dTable1.row.add({
                    "brand": $('#brand').val(),
                    "category": $('#category').val(),
                    "code": $('#code').val(),
                    "description":  $('#description').val(),
                    "unit": $('#unit').val(),
                    "qty": $('#input-qty').val(),
                    "unit_price":   $('#unit_price').val(),
                    "action": '<i class="glyphicon glyphicon-remove"></i>'
                }).draw();
                $('#add-list')[0].reset();
            }
        });
    }


    function loadDataList(){
        var BASEURL = $('#baseURL').val();

        $('#list-table').DataTable({
            ajax: BASEURL + '/getTemp',
            columns:[
                {data: 'brand'},
                {data: 'category'},
                {data: 'code'},
                {data: 'description'},
                {data: 'unit'},
                {data: 'qty'},
                {data: 'unit_price'},
                {data: 'action'}
            ],
            bDestroy: true,
            "order": []
        });
    }




</script>