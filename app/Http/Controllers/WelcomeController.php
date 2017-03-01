<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Theme;
class WelcomeController extends Controller
{

    public function welcome(){
        $theme = Theme::uses('default')->layout('welcome')->setTitle('M');
        return $theme->of('welcome')->render();
    }
}
