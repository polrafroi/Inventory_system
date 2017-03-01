
<style>

    h1,h3{
        margin: 0;
        padding: 0;
    }

    table {
        border-collapse: collapse;
        text-align: center;
        border: 1px solid black;
    }

      thead tr th {
        border: 1px solid black;
         padding: 10px 0px;
         text-transform: uppercase;
         font-size: 12px;
    }

    table tbody tr td{
        padding: 5px 0px;
    }

    .header-container{
        position: fixed; left: 0px; top: -100px; right: 0px; height: 150px; background-color: orange; text-align: center;
    }
    .text-center{
        text-align: center;
    }
    .page-break {
        page-break-after: always;
    }

</style>

<?php  $i = 1; ?>


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

    @foreach ($products as $key => $val)

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




