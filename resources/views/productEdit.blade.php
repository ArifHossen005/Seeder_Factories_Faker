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
        label {
            color: #343a40;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tr:hover {
            background-color: #e9ecef;
        }
    </style>
    <title>Edit Product</title>
</head>
<body>

    <div class="container">
        <h1>Edit Product</h1>

        <!-- Change action route to the update route -->
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('POST') <!-- Ensure the correct method is used (POST) -->

            <table>
                <tr>
                    <th colspan="2">Product Information</th>
                </tr>
                <tr>
                    <td><label for="name">Product Name</label></td>
                    <td><input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Enter product name" required></td>
                </tr>
                <tr>
                    <td><label for="description">Product Description</label></td>
                    <td><textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter product description" required>{{ $product->description }}</textarea></td>
                </tr>
                <tr>
                    <td><label for="price">Product Price</label></td>
                    <td><input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" placeholder="Enter product price" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </td>
                </tr>
            </table>
        </form>
        <a href="{{ route('all.products') }}" class="btn btn-primary">Back</a>        
    </div>

</body>
</html>
