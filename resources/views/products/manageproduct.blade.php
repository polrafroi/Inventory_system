<style>


    .add-product{
        width: 100%;

    }

    #products tbody td:nth-child(8){
        text-align: center;
    }
    .glyphicon {
        padding: 0 5px;
        cursor: pointer;
    }

    .glyphicon.edit{
        color: #337ab6;
    }
    .glyphicon.delete{
        color: red;
    }


    .modal{
        text-align: center;
        background: rgba(255,255,255,0.5);
    }

    .modal:before {
        content: '';
        display: inline-block;
        height: 100%;
        vertical-align: middle;
        margin-right: -4px; /* Adjusts for spacing */
    }

    .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
    }

    .modal-footer {
        text-align: center;
    }
    .modal-footer button{
        padding: 5px;
        width: 70px;
    }

    .form-control {
        margin: 10px 0px 10px 0px;
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
        left: 13px;
        color: #000000;
    }
    .field:focus + .floating-label {
        color: #000000 ;
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

</style>
<div class="row">
    <div class="col-md-3 col-xs-6">
        <input type="text" class="form-control" id="product_search" placeholder="Search">
    </div>
    <div class="col-md-2 col-md-offset-7 col-xs-6">
        <button class="btn btn-primary add-product">Add</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered dt-responsive nowrap" id="products" width="100%">
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
</div>

<!-- Modal -->
<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add new product</h4>
            </div>
            <div class="modal-body">
                <form class="product-modal">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="field-container">
                                <input type="text" class="field form-control" id="brand" placeholder="Brand" required/>
                                <label class="floating-label">BRAND</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-container">
                                <input type="text" class="field form-control" id="category"  placeholder="Category" required/>
                                <label class="floating-label">CATEGORY</label>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="field-container">
                                <input type="text" class="field form-control" id="code" placeholder="Code" required/>
                                <label class="floating-label">CODE</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-container">
                                <input type="text" class="field form-control" id="description" placeholder="Description" required/>
                                <label class="floating-label">DESCRIPTION</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="field-container">
                                <input type="text" class="field form-control" id="quantity" placeholder="Quantity" required/>
                                <label class="floating-label">QUANTITY</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="field-container">
                                <input type="text" class="field form-control" id="unit"  placeholder="Unit" required/>
                                <label class="floating-label">Unit</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="field-container">
                                <input type="text" class="field form-control" id="unit_price" required placeholder="Unit Price"/>
                                <label class="floating-label">UNIT PRICE</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger customize-btn" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary customize-btn save-product">Save</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(document).ready(function(){
        var BASEURL = $('#baseURL').val();
        loadProduct();
        //remove search to create your own
        $('#products_filter input').unbind();
        $('#products_filter input').remove();

        $('#product_search').on('input', function(e) {

            var search_table = $('#products').DataTable();
            search_table.search( this.value ).draw();

        });


        $('.add-product').on('click',function(){
            $('.product-modal')[0].reset();
            $('#myModal').modal('show');
            $('.modal-footer button:nth-child(2)').removeClass('edit-product');
            $('.modal-footer button:nth-child(2)').addClass('save-product');
            $('.modal-footer button:nth-child(2)').text('Save');
        });

        $('body').delegate('.save-product','click',function(){

            $.ajax({
                url:BASEURL+'/addProduct',
                type:'POST',
                data:{
                    '_token': $('meta[name="csrf_token"]').attr('content'),
                    'brand':$('#brand').val(),
                    'category':$('#category').val(),
                    'code':$('#code').val(),
                    'description':$('#description').val(),
                    'unit':$('#unit').val(),
                    'qty':$('#qty').val(),
                    'unit_price':$('#unit_price').val()
                },
                success: function(data){
                    var products = $('#products').DataTable();
                    products.ajax.reload();
                    $('.product-modal')[0].reset();
                    $('#myModal').modal('hide');
                }
            });

        });

        $('body').delegate('.delete','click',function(){
            var prod_id = $(this).data('id')
            swal({
                title: "Are you sure?",
                text: "You want to delete this product?",
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
                        url:BASEURL+'/deleteProduct',
                        type:'POST',
                        data:{
                            '_token': $('meta[name="csrf_token"]').attr('content'),
                            'product_id':prod_id
                        },
                        success: function(data){

                            var products = $('#products').DataTable();
                            products.ajax.reload(null,false);
                            swal("Deleted!", "Product has been deleted.", "success");

                        }
                    });

                }else{
                    swal("", "Cancelled", "success");
                }
            });

        })

        $('body').delegate('.edit-product','click',function(){
            var prod_id = $(this).attr('data-id')

            var brand = $('#brand').val()
            var category = $('#category').val()
            var code = $('#code').val()
            var description = $('#description').val()
            var unit = $('#unit').val()
            var qty = $('#quantity').val()
            var unit_price = $('#unit_price').val()

            swal({
                title: "Are you sure?",
                text: "You want to update this product?",
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
                        url:BASEURL+'/editProduct',
                        type:'POST',
                        data:{
                            '_token': $('meta[name="csrf_token"]').attr('content'),
                            'product_id':prod_id,
                            'brand':brand,
                            'category':category,
                            'code':code,
                            'description':description,
                            'unit':unit,
                            'qty':qty,
                            'unit_price':unit_price
                        },
                        success: function(data){

                            var products = $('#products').DataTable();
                            products.ajax.reload(null,false);
                            swal("Updated!", "Product has been updated.", "success");
                            $('#myModal').modal('hide');

                        }
                    });

                }else{
                    swal("", "Cancelled", "success");
                }
            });

        });



    });



    function loadProduct(){
        var BASEURL = $('#baseURL').val();

       var data = $('#products').DataTable({
            ajax: BASEURL + '/loadProduct',
            columns:[
                {data: 'brand'},
                {data: 'category'},
                {data: 'code'},
                {data: 'description'},
                {data: 'unit'},
                {data: 'qty'},
                {data: 'unit_price'},
                {data: 'action' , bSortable: false }

            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
            bDestroy: true,
            "order": [],
            bLengthChange: false
        });

        $('body').delegate('.edit','click',function(){

            $('#myModal').modal('show');
            $('.modal-footer button:nth-child(2)').removeClass('save-product');
            $('.modal-footer button:nth-child(2)').addClass('edit-product');
            $('.modal-footer button:nth-child(2)').text('Edit');

            $('.edit-product').attr('data-id',$(this).data('id'))

            var datas = data.row($(this).parents('tr')).data();

            $('#brand').val(datas['brand'])
            $('#category').val(datas['category'])
            $('#code').val(datas['code'])
            $('#description').val(datas['description'])
            $('#unit').val(datas['unit'])
            $('#quantity').val(datas['qty'])
            $('#unit_price').val(datas['unit_price'])

        });
    }


    //New error event handling has been added in Datatables v1.10.5
    $.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) {
        console.log(message);
        var products = $('#products').DataTable();
        products.ajax.reload();
    };

</script>