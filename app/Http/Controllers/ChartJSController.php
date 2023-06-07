<?php

namespace App\Http\Controllers;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChartJSController extends Controller
{
    public function index()
    {
        $chart = Sensor::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("month_name"))
        ->orderBy('id','ASC')
        ->pluck('count', 'month_name');

$labels = $chart->keys();
$data = $chart->values();
  
return view('chart', compact('labels', 'data'));
    }
}

