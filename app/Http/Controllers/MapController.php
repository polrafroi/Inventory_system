<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Theme;
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
}
