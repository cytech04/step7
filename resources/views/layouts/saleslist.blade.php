<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>saleslist</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>product_name</th>
                <th>created_at</th>
                <th>updated_at</th>
                
            </tr>
        <thead>
        <tbody>
        @foreach ($sales as $Sales)
            <tr>   
                <td>{{ $Sales->product_name }}</td>        
                <td>{{ $Sales->created_at }}</td>
                <td>{{ $Sales->updated_at }}</td>
                
            </tr>
        @endforeach
        </tbody>
    </table>    
</body>
</html>