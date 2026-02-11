<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'product_name' => 'required|max:255',
            'company_id' => 'required|exists:companies,id',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'comment' => 'nullable|max:10000',
            'image' => 'nullable|image',
        ];
    }
    public function attributes() {
        return [
            'product_name' => '製品名',
            'company_id' => 'メーカ名',
            'price' => '価格',
            'stock' => '在庫',
            'comment' => 'コメント',
            'image' => '商品画像',
        ];
    }

    public function messages() {
        return [
            'product_name.required' => ':attributeは必須項目です。',
            'product_name.max' => ':attributeはmax字以内で入力してください。',
            'company_id.required' => ':attributeは必須項目です。',
            'price.required' => ':attributeは必須項目です。',
            'price.integer' => ':attributeは数値で入力してください。',
            'stock.required' => ':attributeは必須項目です。',
            'stock.integer' => ':attributeは数値で入力してください。',
            'comment.max' => ':attributeはmax字で入力してください。',
            'image.image' => ':attributeは画像ファイルを添付してください。',
        ];
    }
}
