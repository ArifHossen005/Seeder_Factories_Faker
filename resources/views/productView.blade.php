<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>All Products</title>
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">All Products</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
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
                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td> <!-- Adjusted serial number -->
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ number_format($product->price, 2) }}</td> <!-- Formatting price -->
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Displaying the current page range -->
        <div class="d-flex justify-content-center">
            <p>Displaying products {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products</p>
        </div>

        <!-- Simple Pagination links without icons -->
        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::simple-bootstrap-4') }} <!-- Simple pagination -->
        </div>

        <a href="{{ route('product.create') }}" class="btn btn-primary btn-lg btn-block mt-4">Create New Product</a> 
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
