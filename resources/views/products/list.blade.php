<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧画面</title>
</head>

<body>
    <h1>商品一覧画面</h1>

<form action="{{ route('index') }}" method="get">
    <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="検索キーワード">

    <select class="company_select" name="company_select">
    <option value="" disabled selected>メーカー名</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->company_name }}</option>
            @endforeach
    </select>
    <input type="submit" value="検索">
</form>

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
                <td><img src="{{ asset($product->img_path) }}"></td> 
                <td>{{ $product->product_name }}</td> 
                <td>{{ $product->price }}</td> 
                <td>{{ $product->stock }}</td> 
                <td>{{ $product->company_name }}</td> 
                <td><a href= "{{ route('detail',['id' =>$product->id]) }}" class="registbutton">詳細</a></td>
                <td><form action= "{{ route('destroy' ,['id' =>$product->id]) }}" method= "post">
                    @csrf
                       <button type= "submit" class= "danger">削除</button>
                </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
