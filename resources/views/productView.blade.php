<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }
        .table {
            margin-top: 20px;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
    </style>
    <title>All Products</title>
</head>
<body>

    <div class="container">
        <h1>All Products</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price ($)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Products will be loaded here dynamically -->
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route(name: 'product.create') }}" class="btn btn-primary">Go Back Form </a> 
    </div>

</body>
</html>
