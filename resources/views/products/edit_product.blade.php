@extends('layouts.parent')

@section('title', '商品情報編集画面')

@section('content') 
<div class="container">
        <div class="row">
            <h1>商品情報編集画面<h1>
          
            <form action="{{ route('update', ['id' => $edit->id]) }}" method="post" enctype='multipart/form-data'>
                @csrf
                @method('PUT')

                <div class="form group">
                    <label for="product">商品名*</label>
                    <input type="text" class="form-control" id="product" name="product_name" value="{{ $edit->product_name }}">
                </div>

                <div class="form group">
                    <label for="company_name">メーカー名*</label>
                    <select name="company_id" class="form-control">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}"
                        {{ $company->id == $edit->company_id ? 'selected' : '' }}>
                        {{ $company->company_name }}
                        </option>
                    @endforeach
                    </select>                
                </div>    

                <div class="form group">
                    <label for="price">価格*</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $edit->price }}">
                </div>

                <div class="form group">
                    <label for="stock">在庫数*</label>
                    <input type="text" class="form-control" id="stock" name="stock" value="{{ $edit->stock }}">
                </div>

                <div class="form group">
                    <label for="comment">コメント</label>
                    <input type="text" class="form-control" id="comment" name="comment" value="{{ $edit->comment }}">
                </div>

                <div class="form group">
                    <label for="image">商品画像</label>
                    <input type="file" name="image"  >
                </div>

                <button type="submit" class="btn-default">更新</button>

                <button type="button" onclick="location.href='{{ route('detail', ['id' => $edit->id]) }}'" class="rollback">戻る</button>

            </form>
            
        </div>
</div> 
@endsection