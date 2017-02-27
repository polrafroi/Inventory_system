<style>
    html,body{
        height: 100%;
        width: 100%;
    }
    .body-container{
        height: 100%;
        width: 100%;
    }

    .form-group .form-control,.form-group .btn{
        border-radius: 0;
        outline: 0;
    }
    .form-group .form-control:focus{
       box-shadow: none;
        outline: 0;
    }


</style>
<div class="row">
    <div class="col-md-9">
        <table class="table table-striped table-bordered dt-responsive nowrap" id="sample" width="100%">
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
    <div class="col-md-3">
        <form class="add" onsubmit="return false;">
            <h2 class="text-center">ADD</h2>
            <div class="form-group">

                <label for="brand">Brand</label>
                <input type="text" class="form-control" id="brand">

                <label for="category">Category</label>
                <input type="text" class="form-control" id="category">

                <label for="code">Code</label>
                <input type="text" class="form-control" id="code">

                <label for="description">Description</label>
                <input type="text" class="form-control" id="description">

                <label for="unit">Unit</label>
                <select class="form-control" id="unit">
                    <option>Gal.</option>
                    <option>Ltr.</option>
                </select>

                <label for="qty">Qty</label>
                <input type="text" class="form-control" id="qty">

                <label for="unit_price">Unit Price</label>
                <input type="text" class="form-control" id="unit_price">

                <button type="button" class="btn btn-primary" style="width:100%;margin-top: 10px;">Add</button>
            </div>
        </form>
    </div>
</div>

<script>
   $(document).ready(function(){
      var BASEURL = $('#baseURL').val();
      loadProduct();

      $('.btn').on('click',function(){
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
                 var dTable = $('#sample').DataTable();
                 dTable.row.add({
                     "brand": $('#brand').val(),
                     "category": $('#category').val(),
                     "code": $('#code').val(),
                     "description": $('#description').val(),
                     "unit": $('#unit').val(),
                     "qty": $('#qty').val(),
                     "unit_price": $('#unit_price').val(),
                     "action": '<i class="glyphicon glyphicon-pencil"></i> <i class="glyphicon glyphicon-remove"></i>'
                 }).draw();

                 dTable.search($('#description').val()).draw();
             }
          });
      });

   });

    function loadProduct(){
        var BASEURL = $('#baseURL').val();

        $('#sample').DataTable({
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
            "order": []
        });
    }

</script>

