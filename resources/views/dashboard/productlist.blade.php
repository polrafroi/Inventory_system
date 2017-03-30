<div class="row">
    <div class="col-md-3">
        <input type="text" class="form-control" id="product_search" placeholder="Search">
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
            </thead>
        </table>
    </div>
</div>
<script>
    $(document).ready(function(){
        loadProduct();
        //remove search to create your own
        $('#products_filter input').unbind();
        $('#products_filter input').remove();

        $('#product_search').on('input', function(e) {

            var search_table = $('#products').DataTable();
            search_table.search( this.value ).draw();

        });




//        var emoji = $('#emoji-josn').data('json');
//
//        $(emoji).each(function(index,val){
//           saveEmojis(val)
//        });



    });

//    function saveEmojis(name){
//
//        //add attributes to object messages
//        var newPostKey = firebase.database().ref().child('emoji').push().key;
//        firebase.database().ref('emoji/'+newPostKey).set({
//            emoji_name: name
//        });
//
//    }



    function loadProduct(){
        var BASEURL = $('#baseURL').val();

        $('#products').DataTable({
            ajax: BASEURL + '/loadProduct',
            columns:[
                {data: 'brand'},
                {data: 'category'},
                {data: 'code'},
                {data: 'description'},
                {data: 'unit'},
                {data: 'qty'},
                {data: 'unit_price'}

            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
            bDestroy: true,
            "order": [],
            bLengthChange: false
        });
    }


    //New error event handling has been added in Datatables v1.10.5
    $.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) {
        console.log(message);
        var products = $('#products').DataTable();
        products.ajax.reload();
    };

</script>