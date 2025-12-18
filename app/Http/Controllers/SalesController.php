<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
class SalesController extends Controller
{
    public function showList() {
        //インスタンス生成
        $model = new Sales();
        $sales = $model->getList();

        return view('list', ['sales' => $sales]);
    }
}
