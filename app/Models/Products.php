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
        'company_name',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
    ];

    public function getList() {
        //productsテーブルからデータを取得
        $products = DB::table('products')
    ->join('companies', 'products.company_id', '=', 'companies.id')
    ->select('products.*', 'companies.company_name')
    ->get();

        return $products;
    }

    //情報登録用関数
    public function registArticle($data,$image_path) {
        //登録処理
        DB::table('products')->insert([
            'product_name' => $data->product_name,
            'company_id' => $data->company_name,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
            'img_path' => $image_path,
        ]);
    }

     //更新処理（引数にはコントローラーから入力値と更新前データが渡されている）
     public function updateProduct($request, $update){

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $update->img_path = $path;
        }
            //$update（更新前データ）を入力値にまとめて更新する処理
            $update->fill([
                'product_name' => $request->product_name,
                'company_id' => $request->company_name,
                'price' => $request->price,
                'stock' => $request->stock,
                'comment' => $request->comment,
            ])->save();
     }
     
     //削除処理
     public function deleteProduct($id){
          return $this->destroy($id);
     }
     
}
