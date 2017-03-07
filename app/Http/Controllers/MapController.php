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

        date_default_timezone_set('Asia/Hong_Kong');
        $date = date('Y/m/d H:i:s');


        $room_id = $request->room_id;

        $firstname  = Auth::user()->firstname;
        $lastname  = Auth::user()->lastname;
        $name = $firstname .' '. $lastname;
        $data = [
            'case_id' => $request->case_id,
            'user_id' => Auth::user()->id,
            'name' => $name,
            'date' =>$date,
            'room_id' =>$room_id
        ];

        $theme = Theme::uses('default')->layout('welcome')->setTitle('M');
        return $theme->of('realtime',$data)->render();
    }
}
