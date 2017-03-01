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
                             ->limit(25)
                             ->get();

//        $products = DB::table('products')->join('temp','temp.product_id','products.id')
//            ->select('temp.product_qty','products.*')
//            ->count();
//
//        $totalCount = 0;
//        $getRemaining =  ($products % 25);
//        $getPageCount =  (int) ($products / 25);
//        if($getRemaining < 25){
//            $totalCount++;
//        }
//        $totalCount = $totalCount+ $getPageCount;
//
//        $arr = [];
//        $i = 0;
//        while($i < $totalCount){
//            array_push($arr,$products1);
//            $i++;
//        }




        $pdf = PDF::loadView('pdf.invoice',['products'=>$products])->setPaper('a4')->setWarnings(false);
        return $pdf->stream();






//        return $pdf->download('invoice.pdf');
    }


}
   