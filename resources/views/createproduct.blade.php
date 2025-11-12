<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
    <style>
        h1 {    
            text-align: center;
        }
         /* Form Container */
        form {
            background: #fff;
            max-width: 500px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* Form Fields */
        form div {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="file"]:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        /* Buttons */
        button {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button[type="submit"] {
            background: #007BFF;
            color: #fff;
            align-self: center;
            width: 50%;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        button[type="submit"]:hover {
            background: #0056b3;
        }

        button[type="reset"] {
            align-self: center;
            background: #6c757d;
            color: #fff;
            width: 50%;
        }

        button[type="reset"]:hover {
            background: #5a6268;
        }

        /* Success and Error Messages */
        .success {
            max-width: 500px;
            margin: 20px auto;
            padding: 12px;
            background: #d4edda;
            color: #155724;
            border-radius: 8px;
            border: 1px solid #c3e6cb;
            text-align: center;
        }

        .error {
            max-width: 500px;
            margin: 20px auto;
            padding: 12px;
            background: #f8d7da;
            color: #721c24;
            border-radius: 8px;
            border: 1px solid #f5c6cb;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
        }

        /* Responsive */
        @media(max-width: 600px) {
            form {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>

</head>
<body>
    <h1>Create New Product</h1>
@if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
     

        <div>
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>
        </div>

        <div>
            <label for="product_quantity">Product Quantity:</label>
            <input type="text" id="product_quantity" name="product_quantity" required>
        </div>

        <div>
            <label for="product_name">Product Price:</label>
            <input type="number" id="product_price" name="product_price" required>
        </div>

        <div>
            <label for="product_category">Product Category:</label>
            <select id="product_category" name="product_category" required>
                <option value="">Select Category</option>

            @foreach($categories as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
            @endforeach
            </select>
        </div>

        <div>
            <label for="product_description">Product Description:</label>
            <input type="text" id="product_description" name="product_description" required>
        </div>

        <div>
            <label for="product_description">Product Image:</label>
            <input type="file" id="product_image" name="product_image" required>
        </div>

        <div>
            <button type="submit">Create Product</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</body>
</html>


