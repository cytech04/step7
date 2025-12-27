<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細画面</title>
</head>
<body>
    <h1>商品情報詳細画面</h1>
    <table>
       <thead>
         <tr>
                <th>ID</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>メーカー</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>コメント</th>
                <th><a href= "{{ route('edit', ['id' => $detail->id]) }}" class= "edit_button">編集</a></th>
                <th><a href= "{{ route('list') }}" class= "back">戻る</a></th>

         </tr>    
       </thead>
       <tbody>
         <tr>
                <td>{{ $detail->id }}</td>
                <td><img src="{{ asset($detail->img_path) }}"></td> 
                <td>{{ $detail->product_name }}</td> 
                <td>{{ $detail->company_name }}</td> 
                <td>{{ $detail->price }}</td> 
                <td>{{ $detail->stock }}</td> 
                <td>{{ $detail->comment }}</td>
                
                
         </tr>
       </tbody >
        
</body>
</html>