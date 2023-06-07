<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $chart_suhu = Sensor::select(DB::raw("AVG(suhu) as suhu"), DB::raw("weekday(created_at) as day"))
        ->whereYear('created_at', date('Y'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->groupBy(DB::raw("day"))
        ->orderBy('id','ASC')
        ->pluck('suhu', 'day');

        $data_suhu = [];
        for($i = 0; $i<=6; $i++ ){
            if(isset($chart_suhu[$i])){
                $data_suhu[]=round(floatval($chart_suhu[$i]));
            }else{
                $data_suhu[]=0;
            }
        }

        $chart_kelembaban = Sensor::select(DB::raw("AVG(kelembaban) as kelembaban"), DB::raw("weekday(created_at) as day"))
        ->whereYear('created_at', date('Y'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->groupBy(DB::raw("day"))
        ->orderBy('id','ASC')
        ->pluck('kelembaban', 'day');

        $data_kelembaban = [];
        for($i = 0; $i<=6; $i++ ){
            if(isset($chart_kelembaban[$i])){
                $data_kelembaban[]=round(floatval($chart_kelembaban[$i]));
            }else{
                $data_kelembaban[]=0;
            }
        }

        $chart_berat = Sensor::select(DB::raw("AVG(berat) as berat"), DB::raw("weekday(created_at) as day"))
        ->whereYear('created_at', date('Y'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->groupBy(DB::raw("day"))
        ->orderBy('id','ASC')
        ->pluck('berat', 'day');

        $data_berat = [];
        for($i = 0; $i<=6; $i++ ){
            if(isset($chart_berat[$i])){
                $data_berat[]=round(floatval($chart_berat[$i]));
            }else{
                $data_berat[]=0;
            }
        }
        return view('dashboard')->with([
            'datasensor'=>Sensor::latest()->first(),
            'data_suhu'=>$data_suhu,
            'data_kelembaban'=>$data_kelembaban,
            'data_berat'=>$data_berat,
        ]);  
    }
    public function ajax_get_dashboard()
    {
        $chart_suhu = Sensor::select(DB::raw("AVG(suhu) as suhu"), DB::raw("weekday(created_at) as day"))
        ->whereYear('created_at', date('Y'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->groupBy(DB::raw("day"))
        ->orderBy('id','ASC')
        ->pluck('suhu', 'day');

        $data_suhu = [];
        for($i = 0; $i<=6; $i++ ){
            if(isset($chart_suhu[$i])){
                $data_suhu[]=round(floatval($chart_suhu[$i]));
            }else{
                $data_suhu[]=0;
            }
        }

        $chart_kelembaban = Sensor::select(DB::raw("AVG(kelembaban) as kelembaban"), DB::raw("weekday(created_at) as day"))
        ->whereYear('created_at', date('Y'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->groupBy(DB::raw("day"))
        ->orderBy('id','ASC')
        ->pluck('kelembaban', 'day');

        $data_kelembaban = [];
        for($i = 0; $i<=6; $i++ ){
            if(isset($chart_kelembaban[$i])){
                $data_kelembaban[]=round(floatval($chart_kelembaban[$i]));
            }else{
                $data_kelembaban[]=0;
            }
        }

        $chart_berat = Sensor::select(DB::raw("AVG(berat) as berat"), DB::raw("weekday(created_at) as day"))
        ->whereYear('created_at', date('Y'))
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->groupBy(DB::raw("day"))
        ->orderBy('id','ASC')
        ->pluck('berat', 'day');

        $data_berat = [];
        for($i = 0; $i<=6; $i++ ){
            if(isset($chart_berat[$i])){
                $data_berat[]=round(floatval($chart_berat[$i]));
            }else{
                $data_berat[]=0;
            }
        }
        return response()->json([
            'datasensor'=>Sensor::latest()->first(),
            'data_suhu'=>$data_suhu,
            'data_kelembaban'=>$data_kelembaban,
            'data_berat'=>$data_berat,
        ]);
    }

}
