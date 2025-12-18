@extends('layouts.app')

@section('title', '商品新規登録画面')

@section('content') 
     <div class="container">
        <div class="row">
            <h1>商品新規登録画面<h1>
            <form action="{{ route('submit') }}" method="post" enctype='multipart/form-data'>
                @csrf
                
                <div class="form group">
                    <label for="product">商品名*</label>
                    <input type="text" class="form-control" id="product" name="product_name">
                </div>

                <div class="form group">
                <label for="company_name">メーカー名*</label>
                    
                    <select class="form-control" id="company_name" name="company_name">
                        @foreach($companies as $company)
                        <option value="{{$company->id}}"> {{$company->company_name}}</option>
                        @endforeach
                    </select>
                </div>    

                <div class="form group">
                <label for="price">価格*</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>

                <div class="form group">
                <label for="stock">在庫数*</label>
                    <input type="text" class="form-control" id="stock" name="stock">
                </div>

                <div class="form group">
                <label for="comment">コメント</label>
                    <input type="text" class="form-control" id="comment" name="comment">
                </div>

                <div class="form group">
                <label for="image">商品画像</label>
                    <input type="file" name="image">
                </div>
                <button type="submit" class="btn-newregist">新規登録</button>
                <a href="{{ route('list') }}" class="rollback">戻る</a>
            
            </form>
        </div>
    </div>        
@endsection                