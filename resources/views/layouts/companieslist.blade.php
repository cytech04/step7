<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>companieslist</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>company_name</th>
                <th>street_address</th>
                <th>representative_name</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr>
        <thead>
        <tbody>
        @foreach ($companies as $Companies)
            <tr>
                <td>{{ $Companies->id }}</td>    
                <td>{{ $Companies->company_name}}</td>        
                <td>{{ $Companies->street_address}}</td>
                <td>{{ $Companies->representative_name}}</td>
                <td>{{ $Companies->created_at}}</td>
                <td>{{ $Companies->updated_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>    
</body>
</html>