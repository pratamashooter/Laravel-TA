<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class Sensor extends Model
{
    use HasFactory;
    protected $table="sensors";
    protected $fillable = [
        'suhu',
        'kelembaban',
        'berat',
    ];

    public function gatau(Request $request){
       $d= DB::table('sensors')->insert([
        'suhu' => $request->sensordht,
        'kelembaban' => $request->kelembabandht
        ]);        
        echo json_encode($d);
    }
    public function ambildata()
    {
        $data = DB::table('sensors')->select('suhu','created_at')
        ->get();
        return $data;
    }
}
