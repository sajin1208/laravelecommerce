<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
     <style>
    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f6fa;
      margin: 40px;
      width: 90%;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
      font-size: 28px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    thead {
      background-color: #0984e3;
      color: white;
    }

    th, td {
      padding: 12px 16px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      font-size: 15px;
    }

    tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tbody tr:hover {
      background-color: #f1f1f1;
      transition: 0.3s;
    }

    a {
      text-decoration: none;
      color: #19a51b;
      font-weight: bold;
    }

    a:hover {
      color: #1c8e73;
    }

    button {
      background-color: #e74c3c;
      color: white;
      border: none;
      padding: 8px 14px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: 500;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #c0392b;
    }

    form {
      display: inline-block;
    }

    th[colspan="2"] {
      text-align: center;
    }
  </style>
</head>
<body>
    <h2>Product List</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Price:</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
             <td>{{ $product->padded_product_id }}</td>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->product_quantity }}</td>
        <td>{{ $product->product_description }}</td>
        <td>{{ $product->product_price }}</td>
                <td>
                        <a href="{{ route('products.edit', ['id' => $product->product_id]) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('products.remove', $product->product_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                        </form>
                    </td>
                   
            </tr>
            @endforeach
        </tbody>
    
</body>
</html>