<style>
    .recent-container {
        height: 325px;
        position: relative;
        top: 74px;
    }
    .labels-cutomize {
        color: #4a5a6a;
        font-size: 15px;
        top: 50px;
        font-weight: bold;
    }
    .pagination{
        display: none;
    }

</style>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/af.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<h4>Your Vitals</h4>

<div class="row">
    <div class="col-md-12">

        <div style="width:75%;position: relative;top: 20px;margin: auto;">
            <div class="labels-cutomize">Statistics</div>
            {!! $chartjs->render() !!}
        </div>
    </div>
    <div class="col-md-12">
        <div class="recent-container">
            <div class="labels-cutomize">Recent Purchase Invoice</div>
            <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Purchase Date</th>
                    <th>Reference Number</th>
                    <th>Vendor Name</th>
                    <th>Order Subtotal</th>
                    <th>Other Charges Total</th>
                    <th>Order Total</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                    </tr>
                    <tr>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                    </tr>
                    <tr>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                    </tr>
                    <tr>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                    </tr>
                    <tr>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                        <td>sad</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="col-md-12">
        <div class="toppurchase-container">
            <div class="labels-cutomize">Top 5 Purchase Product</div>
            <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                </tr>
                <tr>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                </tr>
                <tr>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                </tr>
                <tr>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                </tr>
                <tr>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                    <td>sad</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    var table1 = $('#example1').DataTable({
        "bLengthChange": false,
        "pageLength": 4,
        "serverSide": false

    });

    var table2 = $('#example2').DataTable({
        "bLengthChange": false,
        "pageLength": 5,
        "serverSide": false

    });
</script>
