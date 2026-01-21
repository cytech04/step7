<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    // 可変項目
    protected $fillable =
    [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
    ];

    //productsテーブル全件とcompaniesテーブルのcompany_name取得
    public function getList() {
    //idでテーブルを連結してproductテーブル全件とcompaniesテーブルのcompany_nameを取得
    $products = DB::table('products')
    ->join('companies', 'products.company_id', '=', 'companies.id')
    ->select('products.*', 'companies.company_name')
    ->get();

        return $products;
    }

    //新規登録処理
    public function registArticle($data,$image_path) {
        //テーブルのカラムに入力欄の内容を挿入。
        DB::table('products')->insert([
            'product_name' => $data->product_name,
            'company_name' => $data->company_name,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
            'img_path' => $image_path,
        ]);
    }

    //更新処理
    public function updateProduct($request, $update){
        
        //画像以外のデータを$dataへ格納処理。
        $data = [
            'product_name' => $request->product_name,
            'company_id' => $request->company_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'comment' => $request->comment,
        ];

        //画像の取得処理
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
        //$dataに画像の情報を格納。（※他のデータは下の処理で実施。）
            $data['img_path'] = $path;
        }

        //$update(更新前情報)に$dataの内容に更新＆保存処理。
        $update->fill($data)->save();
    }
     
    //削除処理
     public function deleteProduct($id){
          return $this->destroy($id);
    }

    //検索処理
    public function search($keyword){
        $products = DB::table('products')
            ->join('companies', 'products.company_id', '=', 'companies.id')
            ->select('products.*', 'companies.company_name')
            ->where('products.product_name', 'like', '%' . $keyword . '%')
            ->get();
        
        return $products;
    }
        //$products = DB::table('products')
        //->join('companies', 'products.company_id', '=', 'companies.id')
       // ->select('products.*', 'companies.company_name')
        //->where('products.product_name','like','%'. $keyword.'%');
//return $products;
 
  }


