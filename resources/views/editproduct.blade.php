<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

     <form action="{{ route('products.update', $product->product_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>
        </div>

        <div>
            <label for="product_quantity">Product Quantity:</label>
            <input type="text" id="product_quantity" name="product_quantity" required>
        </div>

        <div>
            <label for="product_description">Product Price:</label>
            <input type="number" id="product_price" name="product_price" required>
        </div>

        <div>
            <label for="product_category">Product Category:</label>
            <input type="text" id="product_category" name="product_category" required>

        </div>

        <div>
            <label for="product_description">Product Description:</label>
            <input type="text" id="product_description" name="product_description" required>
        </div>

        <div>
            <label for="product_image">Product Image:</label>
            <input type="file" id="product_image" name="product_image" >
        </div>

        <div>
            <button type="submit">Edit Product</button>
            <button type="reset">Reset</button>
        </div>
</body>
</html>