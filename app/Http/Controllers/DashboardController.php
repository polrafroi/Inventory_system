<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Theme;

class DashboardController extends Controller
{
    public function viewDashboard(){

        $theme = Theme::uses('default')->layout('main')->setTitle('dashboard');

        return $theme->of('dashboardmain')->render();
    }
}
