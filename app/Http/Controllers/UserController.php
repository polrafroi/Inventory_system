<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Theme;

class UserController extends Controller
{
    public function viewUser(){

        $theme = Theme::uses('default')->layout('main')->setTitle('Users');

        return $theme->of('user')->render();
    }
}
