<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧画面</title>
</head>
<body>
    <h1>商品一覧画面</h1>
    <input type="text" placeholder="検索キーワード">
    <input type="text" placeholder="メーカー名">
    <input type="submit" value="検索">

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>メーカー名</th>
                <th><a href = "{{route('regist')}}" class= "registbutton">新規登録</a></th>
            </tr>
        </thead>    
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->img_path }}</td> 
                <td>{{ $product->product_name }}</td> 
                <td>{{ $product->price }}</td> 
                <td>{{ $product->stock }}</td> 
                <td>{{ $product->company_name }}</td> 
                <td><a href= "{{ route('detail',['id' =>$product->id]) }}" class="registbutton">詳細</a></td>
                
                    <form action= "{{ route('destroy' ,['id' =>$product->id]) }}" method= "post">
                       @csrf
                       <button type= "submit" class= "danger">削除</button>
                    </form>

            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
