<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Theme;
use DB;
use Yajra\Datatables\Facades\Datatables;

class UserController extends Controller
{
    public function viewUser(){

        $theme = Theme::uses('default')->layout('main')->setTitle('Users');

        return $theme->of('user')->render();
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

}
