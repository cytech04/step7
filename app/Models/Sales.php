<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Sales extends Model
{
    public function getList() {
        //salesテーブルからデータを取得
    $sales = DB::table('sales')->get();

    return $sales;
 }    
}
