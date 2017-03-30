<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered dt-responsive nowrap" id="receipt" width="100%">
                <thead>
                <th>Receipt number</th>
                <th>Branch</th>
                <th>Created by</th>
                <th>Date</th>
                <th>Action</th>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
       $('#receipt').dataTable({
           ajax: 'getReceipts',
           columns:[
               {data: 'receipt_no'},
               {data: 'branch_name'},
               {data: 'created_by'},
               {data: 'created_at'},
               {data: 'action' , bSortable: false }
           ]
       });


    });
</script>