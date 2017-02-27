<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Theme;
use App\Products;
use \App\Temp;

class ProductController extends Controller
{

    public function loadProduct()
    {
        $productList = Products::all();
        $btn_edit = '<i class="glyphicon glyphicon-pencil"></i>';
        $btn_delete = '<i class="glyphicon glyphicon-remove"></i>';
        $data  = array();
        foreach ($productList as $key => $val){
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


    public function productOut(){
        $theme = Theme::uses('default')->layout('default')->setTitle('M');
        return $theme->of('productout')->render();
    }

    public function addToList(Request $request){
        $product_id = $request->product_id;
        $qty = $request->qty;

        $getOldQty = Products::where('id',$product_id)->first()->qty;
        $newQty = ($getOldQty - $qty);

        DB::table('products')->where('id',$product_id)->update(['qty'=>$newQty]);
        Temp::insert(['product_id'=>$product_id,'product_qty'=>$qty]);


    }

    public function getTemp(){
        $productList = DB::table('temp')->select('temp.temp_id','temp.product_qty','products.*')->join('products','products.id','temp.product_id')->get();

        $data  = array();

        foreach ($productList as $key => $val){
            $btn_delete = '<i class="glyphicon glyphicon-remove" data-id="'.$val->temp_id.'"></i>';
            array_push($data,['id'=>$val->temp_id,'brand'=>$val->brand,'category'=>$val->category,'code'=>$val->code,'description'=>$val->description,'unit'=>$val->unit,'qty'=>$val->product_qty,'unit_price'=>$val->unit_price,'action'=>$btn_delete]);
        }
        return json_encode(['data'=>$data]);
    }
}
