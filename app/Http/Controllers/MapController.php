<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Theme;
use Auth;
class MapController extends Controller
{
    public function gmaps(){


        $locations = DB::table('locations')->get();

        $data =array(
            'locations' => $locations
        );
        $theme = Theme::uses('default')->layout('default')->setTitle('M');
        return $theme->of('gmaps',compact('locations'), $data)->render();
    }

    public function real(Request $request){

        $firstname  = Auth::user()->first_name;
        $lastname  = Auth::user()->last_name;
        $name = $firstname[0];
        $data = [
            'case_id' => $request->case_id,
            'user_id' => Auth::user()->id,
            'name' => $name
        ];

        $theme = Theme::uses('default')->layout('default')->setTitle('M');
        return $theme->of('realtime',$data)->render();
    }
}
