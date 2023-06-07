<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EspController extends Controller
{
    public function sensor ($temperature, $humidity)
    {
    $data =DB::table('sensors');
    $tgl = Carbon::now();

    $data->insert([
        'suhu' => $temperature,
        'kelembaban' => $humidity,
        'created_at' => $tgl,
        'update_at' => $tgl

    ]);
    }
    
    public function datafront()
    {
        $data = New Sensor();
        $datasensor = $data->ambildata();
        echo json_encode($datasensor);
    }
}
