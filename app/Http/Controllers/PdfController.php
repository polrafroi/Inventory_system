<?php

namespace App\Http\Controllers;

use App\Temp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Theme;
use PDF;
class PdfController extends Controller
{

    public function loadPdf(){

        $products = DB::table('products')->join('temp','temp.product_id','products.id')
                             ->select('temp.product_qty','products.*')
                             ->get()->chunk(25);


        $product_arr = [];

        foreach($products as $key=> $val){

            array_push($product_arr,$val);
        }

        $pdf = PDF::loadView('pdf.invoice',['products'=>$product_arr])->setPaper('a4')->setWarnings(false);
        return $pdf->stream();





//        return $pdf->download('invoice.pdf');
    }


}
   