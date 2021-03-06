<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Theme;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theme = Theme::uses('default')->layout('default')->setTitle('M');
        return $theme->of('dashboard')->render();
    }

    public function real(Request $request){

        $theme = Theme::uses('default')->layout('default')->setTitle('M');
        $data = [
            $case_id = $request->case_id
        ];
        return $theme->of('realtime', $data)->render();
    }


    public function chat(){

        $theme = Theme::uses('default')->layout('default')->setTitle('M');

        return $theme->of('chat')->render();
    }

}
