@extends('layouts.parent')

@section('title', '商品一覧画面')

@section('content') 
    <h1>商品一覧画面</h1>
    <form action="{{ route('list') }}" method="get">
        <input type="text" name="keyword" placeholder="検索キーワード" value="{{ request('keyword') }}">

        <select name="company_id">
        <option value="">メーカーを選択</option>
        @foreach ($companies as $company)
            <option value="{{ $company->id }}"
                {{ request('company_id') == $company->id ? 'selected' : '' }}>
                {{ $company->company_name }}
            </option>
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
                <td><img src="{{ asset('storage/' . $product->img_path) }}"></td> 
                <td>{{ $product->product_name }}</td> 
                <td>{{ $product->price }}</td> 
                <td>{{ $product->stock }}</td> 
                <td>{{ $product->company_name }}</td> 
                <td><a href= "{{ route('detail',['id' =>$product->id]) }}" class="registbutton">詳細</a></td>
                <td><form action= "{{ route('destroy' ,['id' =>$product->id]) }}" method= "post">
                    @csrf
                       <button type= "submit" class= "danger">削除</button></form></td>
            </tr>
        @endforeach
        </tbody>

    </table>
@endsection
