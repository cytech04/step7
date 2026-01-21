<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ArticleRequest;
use App\Models\Companies;
use Illuminate\Support\Facades\Auth;
use Exception;

class ProductsController extends Controller
{
    //商品一覧画面
    public function showList(Request $request) {
        $model = new Products();
        
        // 検索キーワードを取得
        $keyword = $request->input('keyword');
        
        // キーワードがある場合は検索、ない場合は全件取得
        if ($keyword) {
            $products = $model->search($keyword);
        } else {
            $products = $model->getList();
        }
        
        // ビューにデータを渡す（1つの配列にまとめる）
        return view('products.list', [
            'products' => $products
        ]);    
    }

    //登録画面表示用関数
    public function showRegistForm() {
        $model = new Companies();
        $companies = $model->getList();

        return view('products.regist',['companies' => $companies]);
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
    public function detaillist($id){

    $detail = DB::table('products')
        ->join('companies', 'products.company_id', '=', 'companies.id')
        ->select('products.*', 'companies.company_name')
        ->where('products.id', $id)
        ->first();

        return view('products.detail_product', compact('detail'));
    }

    //編集画面
    public function editlist($id){

        $edit = Products::find($id);
        $companies = Companies::all();

    return view('products.edit_product', compact('edit', 'companies'));

    }

    //更新処理
    public function update(ArticleRequest $request, $id){

        DB::beginTransaction();
        try {
         //更新前データ($id)を抽出してインスタンス化($update)
        $update = Products::find($id);
        //自作updateProduct関数を使いたいのでモデルクラスのインスタンス化
        $product = new Products();
        //モデルクラスのupdateProduct関数に更新前データ（$update）と入力値を渡す
        $product->updateProduct($request, $update);
        DB::commit();

        return redirect()->route('edit', ['id' => $id]);

        } catch (Exception $e) {
        DB::rollback();
        return redirect()->route('edit', ['id' => $id]);
    }
}

    //削除処理
    public function destroy($id)
{
    try {
        DB::beginTransaction();

        $product = Products::findOrFail($id);
        $product->delete();

        DB::commit();

        return redirect()->route('list');

    } catch (Exception $e) {
        DB::rollBack();
    }
}
    
    //検索機能
//public function search(Request $request){
      //$keyword = $request->input('keyword');
      //$model = new products();
      //$products_modelsearch = $model->search($keyword);

        //return view('products.list', ['products' => $products_modelsearch]);
    //} 
}    