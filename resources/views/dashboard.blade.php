<style>
    html,body,.body-container{
        height: 100%;}

    .navbar{
        margin-top: 10px;
    }

</style>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                asd
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right" >
                <li><a>asdasd</a></li>
                <li><a>asdasd</a></li>
                <li><a>asdasd</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="body-container">
    <div class="container-fluid">

        <table class="table table-striped table-bordered dt-responsive nowrap" id="sample" width="100%">
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
            ]

        });
    }

</script>

