<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Theme;
use DB;
use App\Receipts;
class ReceiptController extends Controller
{
    public function getReceipts(){
        $getReceipts = DB::table('receipts')->join('branch','branch.id','receipts.branch_id')->get();
        $data = [];
        foreach($getReceipts as $key => $val){
            array_push($data, ['receipt_no'=>$val->receipt_no,'branch_name'=>$val->branch_name,'created_by'=>$val->created_by,'created_at'=>$val->created_at,'action'=>'<i class="fa fa-lg fa-eye"> View</i>']);
        }



        return json_encode(['data'=>$data]);
    }


}