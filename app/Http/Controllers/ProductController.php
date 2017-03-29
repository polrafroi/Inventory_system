<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Theme;
use App\Products;
use \App\Temp;
use PDF;

class ProductController extends Controller
{

    public function loadProduct()
    {
        $productList = Products::all();

        $data  = array();
        foreach ($productList as $key => $val){
            $btn_edit = '<i class="glyphicon glyphicon-pencil edit" data-id="'.$val->id.'"></i>';
            $btn_delete = '<i class="glyphicon glyphicon-remove delete" data-id="'.$val->id.'"></i>';
            array_push($data,['id'=>$val->id,'brand'=>$val->brand,'category'=>$val->category,'code'=>$val->code,'description'=>$val->description,'unit'=>$val->unit,'qty'=>$val->qty,'unit_price'=>$val->unit_price,'action'=>$btn_edit.'   '.$btn_delete]);
        }

        return json_encode(['data'=>$data]);
    }



    public function addProduct(Request $request){

        $brand = $request->brand;
        $category = $request->category;
        $code = $request->code;
        $description = $request->description;
        $unit = $request->unit;
        $qty = $request->qty;
        $unit_price = $request->unit_price;
        Products::insert(['brand'=>$brand,'category'=>$category,'code'=>$code,'description'=>$description,'unit'=>$unit,'qty'=>$qty,'unit_price'=>$unit_price]);
    }

    public function editProduct(Request $request){
        $product_id = $request->product_id;
        $brand = $request->brand;
        $category = $request->category;
        $code = $request->code;
        $description = $request->description;
        $unit = $request->unit;
        $qty = $request->qty;
        $unit_price = $request->unit_price;

        DB::table('products')->where('id',$product_id)->update(['brand'=>$brand,'category'=>$category,'code'=>$code,'description'=>$description,'qty'=>$qty,'unit'=>$unit,'unit_price'=>$unit_price]);
    }

    public function deleteProduct(Request $request){
        $product_id = $request->product_id;
        Products::where('id',$product_id)->delete();
    }





    public function addToList(Request $request){


        $product_id = $request->product_id;
        $qty = $request->qty;

        $product = Temp::where('product_id',$product_id)->first();
        if(count($product) > 0){
            $productOldQty = $product->product_qty;
            $productNewQty = $product->product_qty + $qty;
            DB::table('temp')->where('product_id',$product_id)->update(['product_qty'=>$productNewQty]);
        }else{
            Temp::insert(['product_id'=>$product_id,'product_qty'=>$qty]);
        }

        $getOldQty = Products::where('id',$product_id)->first()->qty;
        $newQty = ($getOldQty - $qty);
        DB::table('products')->where('id',$product_id)->update(['qty'=>$newQty]);

        $total = DB::table('temp')->join('products','products.id','temp.product_id')->select(DB::raw('sum(temp.product_qty * products.unit_price) as Total'))->first();

        return $total->Total;

    }

    public function removeToList(Request $request){
        $prod_id = $request->product_id;
        $temp_id = $request->temp_id;
        $getTempQty = Temp::where('temp_id',$temp_id)->first()->product_qty;
        $getProdOldQty = Products::where('id',$prod_id)->first()->qty;
        $newQty = $getProdOldQty + $getTempQty;
        DB::table('products')->where('id',$prod_id)->update(['qty'=>$newQty]);
        Temp::where('temp_id',$temp_id)->delete();
    }

    public function getTemp(){
        $productList = DB::table('temp')->select('temp.temp_id','temp.product_qty','products.*')->join('products','products.id','temp.product_id')->get();
        $data  = array();
        foreach ($productList as $key => $val){
            $btn_delete = '<i class="glyphicon glyphicon-remove" data-id="'.$val->temp_id.'" data-prod_id="'.$val->id.'"></i>';
            array_push($data,['id'=>$val->temp_id,'brand'=>$val->brand,'category'=>$val->category,'code'=>$val->code,'description'=>$val->description,'unit'=>$val->unit,'qty'=>$val->product_qty,'unit_price'=>$val->unit_price,'action'=>$btn_delete]);
        }
        return json_encode(['data'=>$data]);
    }


    public function printReceipt(Request $request){

        $location = Input::get('location');

        $getProducts = DB::table('products')->join('temp','temp.product_id','products.id')
            ->select('temp.temp_id','temp.product_qty','products.*')
            ->get()->chunk(25);
        $getAllReceipt = [];
        foreach($getProducts as $key => $products){
            $arr_id = [];
            $lastNumber = DB::table('receipt_ctr')->orderBy('id','desc')->first();
            $receiptNumber = 'MC-000'.$lastNumber->id;
            foreach($products as $key=>$val){
                array_push($arr_id,$val->temp_id);

                DB::table('product_out')->insert(['product_id'=>$val->id,'qty'=>$val->product_qty,'receipt_id'=>$receiptNumber]);
            }
            DB::table('receipt_ctr')->insert(['ctr'=>'ctr']);
            DB::table('temp')->whereIn('temp_id',$arr_id)->delete();
            array_push($getAllReceipt,$receiptNumber);
        }

        $pdf = PDF::loadView('pdf.invoice',['receipt_no'=>$getAllReceipt,'location'=>$request->location])->setPaper('a4')->setWarnings(false);
        return $pdf->download('invoice-'.date('Y-m-d').'.pdf');

    }

    public function saveProductIn(Request $request){
        $products = $request->products;
        $supplier_id = $request->supplier_id;
        $receipt_no = $request->receipt_no;

        //check if data exists

        $ifExist = DB::table('product_in')->where('supplier_id',$supplier_id)->where('receipt_no',$receipt_no)->count();
        if($ifExist > 0){
            return 'Data already exist';
        }else{
            foreach($products as $key => $val){
                $getOldQty = DB::table('products')->where('id',$val['product_id'])->first()->qty;
                $newQty = $val['product_qty'] + $getOldQty;
                DB::table('products')->where('id',$val['product_id'])->update(['qty'=>$newQty]);
                DB::table('product_in')->insert(['product_id'=>$val['product_id'],'product_qty'=>$val['product_qty'],'receipt_no'=>$receipt_no,'supplier_id'=>$supplier_id]);
            }
        }
    }


    public function viewProductsMobile(){
        if($this->isMobile()){
            $theme = Theme::uses('mobile')->layout('default')->setTitle('dashboard');
            return $theme->of('mobileproducts')->render();
        }
    }


    public function viewProductInMobile(){
        if($this->isMobile()){
            $theme = Theme::uses('mobile')->layout('default')->setTitle('dashboard');
            return $theme->of('mobileproductin')->render();
        }
    }
}
