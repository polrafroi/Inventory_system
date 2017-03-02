
<style>

    @page {
        margin: 180px 50px;
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
        margin: 0px;
    }

      thead tr th {
        border: 1px solid black;
         padding: 10px 0px;
         text-transform: uppercase;

    }

    table tbody tr td{
        padding: 5px 0px;
    }

    .page-break {
        page-break-after: always;
    }


    .header{
        text-align: center;
        position: fixed;
        top: -150px;
        margin: 0;
        background-color: white;
    }
    .header h1{
        text-transform: uppercase;
        font-size: 24px;
    }
    .header .sub-header h3{
        font-weight: normal;
        text-transform: capitalize;
        font-size: 14px;
    }




    .branch-name{
        position: fixed;
        left: 0;
        top: -50px;
        font-size: 20px;
        text-transform: uppercase;
        padding: 8px 5px 0px 5px;
        background-color: white;
        font-weight: 700;
    }

    .inv-number{
        position: fixed;
        right: 0;
        top: -60px;
        border: 1px solid red;
        height: 30px;
        font-size: 20px;
        width: 120px;
        text-align: center;
        padding: 8px 5px 0px 5px;
        font-weight: bold;
        background-color: white;
    }

    .page-copy{
        position: fixed;
        text-align: left;
        bottom: -140px;
        background-color: white;
        font-size: 12px;
        font-style: italic;
    }

    .date{
        position: fixed;
        text-align: right;
        top: -18px;
        background-color: white;
    }
</style>

<?php $ctr= 0; ?>
@foreach ($products as $key => $product)
    <?php $ctr++; ?>
    @for($i = 1;$i <= 3;$i++)

        <div class="header">
            <h1>mcoat paint commercial & general merchandise</h1>
            <div class="sub-header">
                <h3>mcoat paint commercial and general merchandise</h3>
                <h3>Tin 0139012389123</h3>
                <h3>Cel: 1023-1923-1230</h3>
            </div>
        </div>

        <div class="branch-name">
            Branches of the Philippines
        </div>
        <div class="inv-number">
            MC-000001
        </div>
        <div class="date">
            Date: 10/27/13
        </div>

            

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

        <div class="page-copy">
            @if( $i == 1 )
                <p>This the original copy</p>
            @elseif( $i == 2 )
                <p>This the second copy</p>
            @else
                <p>This the third copy</p>
            @endif
        </div>

        @if($ctr <= count($products))
        <div class="page-break"></div>
        @endif
    @endfor
@endforeach




