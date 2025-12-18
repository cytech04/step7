<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細</title>
</head>
<body>
<div class="container">
        <div class="row">
            <h1>商品情報編集画面<h1>
          
            <form action="{{ route('update', ['id' => $edit->id]) }}" method="post" enctype='multipart/form-data'>
                @csrf
                
                <div class="form group">
                    <label for="product">商品名*</label>
                    <input type="text" class="form-control" id="product" name="product_name" >
                </div>

                <div class="form group">
                <label for="company_name">メーカー名*</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" >
                </div>    

                <div class="form group">
                <label for="price">価格*</label>
                    <input type="text" class="form-control" id="price" name="price" >
                </div>

                <div class="form group">
                <label for="stock">在庫数*</label>
                    <input type="text" class="form-control" id="stock" name="stock" >
                </div>

                <div class="form group">
                <label for="comment">コメント</label>
                    <input type="text" class="form-control" id="comment" name="comment" >
                </div>

                <div class="form group">
                <label for="image">商品画像</label>
                    <input type="file" name="image"  >
                </div>

                <button type="submit" class="btn-default">更新</button>
                <button type="button" onClick = "history.back()" class="rollback">戻る</button>
            </form>
            
        </div>
    </div>        
</body>
</html>