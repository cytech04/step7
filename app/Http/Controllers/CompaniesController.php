<?php

namespace App\Http\Controllers;
use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function showList() {
    //インスタンス生成
    $model = new Companies();
    $companies = $model->getList();

        return view('companieslist', ['companies' => $companies]);
    }
}
