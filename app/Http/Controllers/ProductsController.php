<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ArticleRequest;
use App\Models\Companies;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function showList() {
        //インスタンス生成
        $model = new Products();
        $products = $model->getList();
        
        return view('layouts.list',['products' => $products]);    
    }

    //登録画面表示用関数
    public function showRegistForm() {
        $model = new Companies();
        $companies = $model->getList();

        return view('layouts.regist',['companies' => $companies]);
    }

    //登録処理用関数
    public function registSubmit(ArticleRequest $request) {
   
        //画像ファイルの取得
        $image = $request->file('image');
        $image_path = null;
        if($image){
           //画像ファイルのファイル名の取得
           $file_name = $image->getClientOriginalName();
           //storage/app/public/imagesフォルダ内に、取得したファイル名で保存
           $image->storeAs('public/images', $file_name);
           //データベース登録用に、ファイルパスを作成
           $image_path = 'storage/images/' . $file_name;
        }
        
        //トランザクション開始
        DB::beginTransaction();

        try {
            //登録処理呼び出し
            $model = new Products();
            $model->registArticle($request,$image_path);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }

        //処理が完了したらregistにリダイレクト
        return redirect(route('regist'));
    }
    
    //詳細画面
    public function detaillist($id) {
            $detail = Products::find($id);

            return view('layouts.detail_product', ['detail' => $detail]);
    }

    //編集画面
    public function editlist($id) {
        
            $edit = Products::find($id);
            return view('layouts.edit_product', ['edit' => $edit]);
    }

    //更新処理
    public function update(Request $request, $id) {
            //更新前データ($id)を抽出してインスタンス化($update)
            $update = Products::find($id);

            //自作updateProduct関数を使いたいのでモデルクラスのインスタンス化
            $product = new Products();
            //モデルクラスのupdateProduct関数に更新前データ（$update）と入力値を渡す
            $product->updateProduct($request, $update);
            return redirect (route('edit', $id));
    }

    //削除処理
    public function destroy($id){
            $product = Products::find($id);
            $product->delete();

            return redirect()->route('list');
    }

}   