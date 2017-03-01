
<style>

    @page {
        margin: 150px 50px;
    }
    #header {
        position: fixed;
        left: 0px;
        top: -130px;
        right: 0px;
        height: 100px;
        background-color: orange;
        text-align: center;
        margin-bottom: 10;
    }

    #footer{
        position: fixed;
        left: 0px;
        bottom: -120px;
        right: 0px;
        height: 100px;
        background-color: orange;
        text-align: center;
        margin-bottom: 10;
    }

    h1,h3{
        margin: 0;
        padding: 0;
    }

    table {
        border-collapse: collapse;
        text-align: center;
        border: 1px solid black;
        font-size: 12px;
    }

      thead tr th {
        border: 1px solid black;
         padding: 10px 0px;
         text-transform: uppercase;

    }

    table tbody tr td{
        padding: 5px 0px;
    }
    .text-center{
        text-align: center;
    }
    .page-break {
        page-break-after: always;
    }

</style>



<div id="header">
    <div class="header text-center">
        <h1>Title</h1>
        <div class="sub-header">
            <h3>Title</h3>
        </div>
    </div>
    <div class="header-info">
        <div class="inv-number">

        </div>
    </div>
</div>
<?php $ctr= 0; ?>
@foreach ($products as $key => $product)
<?php $ctr++; ?>
<table class="table" id="sample" width="100%">
    <thead>
    <tr>
        <th>Brand</th>
        <th>Category</th>
        <th>Code</th>
        <th>Description</th>
        <th>Unit</th>
        <th>Qty</th>
        <th>Unit Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($product as $key => $val)

    <tr>
        <td>{{ $val->brand }}</td>
        <td>{{ $val->category }}</td>
        <td>{{ $val->code }}</td>
        <td>{{ $val->description }}</td>
        <td>{{ $val->unit }}</td>
        <td>{{ $val->product_qty }}</td>
        <td>{{ $val->unit_price }}</td>
    </tr>
    @endforeach


    </tbody>
</table>
    @if($ctr < count($products))
        <div class="page-break"></div>
    @endif
@endforeach



