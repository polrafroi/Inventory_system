<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Theme;
use DB;
use Yajra\Datatables\Facades\Datatables;

class UserController extends Controller
{
    public function viewUser(){
        if($this->isMobile()){
            $theme = Theme::uses('mobile')->layout('default')->setTitle('dashboard');
            return $theme->of('mobileuser')->render();
        }else{
            $theme = Theme::uses('default')->layout('main')->setTitle('Users');
            return $theme->of('user')->render();
        }
    }

    public function userAjax(Request $request){

        $users = DB::table('users')->get();

        return Datatables::of($users)
            ->addColumn('branch', function ($data) use ($request){
                return $data->branch;
            })
            ->addColumn('store', function ($data) use ($request){
                return $data->store_name;
            })
            ->addColumn('phonenumber', function ($data) use ($request){
                return $data->phone_number;
            })
            ->addColumn('email', function ($data) use ($request){
                return $data->email;
            })
            ->addColumn('lastname', function ($data) use ($request){
                return $data->lastname;
            })
            ->addColumn('firstname', function ($data) use ($request){
                return $data->firstname;
            })
            ->make(true);
    }

    public function loadUser(){

        $data =  DB::table('users')->join('branch','users.branch_id','branch.id')
                                   ->select('users.*','branch.branch_name')
                                    ->get();
        $users = [];
        foreach($data as $key => $val){
            $btn_edit = '<i class="glyphicon glyphicon-pencil edit" data-id="'.$val->id.'"></i>';
            $btn_delete = '<i class="glyphicon glyphicon-remove delete" data-id="'.$val->id.'"></i>';
            array_push($users,['first_name'=>$val->first_name,'last_name'=>$val->last_name,'email'=>$val->email,'contact'=>$val->contact,'branch'=>$val->branch_name,'action'=>$btn_edit.' '.$btn_delete]);
        }
        return json_encode(['data'=>$users]);
    }

    public function addUser(Request $request){
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $branch_id = $request->branch_id;
        $email = $request->email;
        $password = $request->password;
        $contact = $request->contact;

       $id = User::insertGetId(['first_name'=>$first_name,'last_name'=>$last_name,'branch_id'=>$branch_id,'email'=>$email,'password'=>Hash::make($password),'contact'=>$contact]);

       return $id;
    }

}
