<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Theme;
use DB;
class DashboardController extends Controller
{
    public function viewDashboard(){

            $branch = DB::table('statistics')
                ->select('name','data','backgroundcolor','bordercolor')
                ->get();

            $array_branch = array();

            foreach ($branch as $key => $val){

                $str = $val->data;
                $string_parts = explode(",", $str);

                array_push($array_branch,[

                    'label' => $val->name,
                    'backgroundColor' => $val->backgroundcolor,
                    'borderColor' => $val->bordercolor,
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => $string_parts,
                ]);

            }


            $chartjs = app()->chartjs
                ->name('lineChartTest')
                ->type('line')
                ->size(['width' => 400, 'height' => 200])
                ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'])
                ->datasets($array_branch)
                ->options([]);


            $theme = Theme::uses('default')->layout('main')->setTitle('dashboard');
            return $theme->of('dashboardmain', compact('chartjs'))->render();
        }

}
