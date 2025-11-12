<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
     <style>
        /* === General Layout === */
.main-container {
    display: flex;
    min-height: 100vh;
    font-family: 'Poppins', sans-serif;
    background-color: #f9fafc;
    color: #333;
}

/* === Sidebar === */
.side-bar {
    width: 230px;
    background-color: #000000;
    border-right: 1px solid #e5e5e5;
    padding: 25px 20px;
    box-shadow: 2px 0 6px rgba(0, 0, 0, 0.05);
    border-radius: 15px;
    display: flex;
    flex-direction: column;
}

.side-bar a {
    color: #ffffff;
    text-decoration: none;
    font-size: 16px;
    padding: 10px 15px;
    border-radius: 8px;
    transition: all 0.3s ease;
    background-color: #000000;
}

.side-bar a:hover {
    background-color: #007bff;
    color: white;
}

/* === Content Area === */
.content-area {
    flex-grow: 1;
    padding: 40px;
    background-color: #fdfdfd;
}

.content-area h3 {
    font-size: 24px;
    color: #222;
    margin-bottom: 25px;
    border-bottom: 2px solid #007bff;
    display: inline-block;
    padding-bottom: 5px;
}

/* === Product Grid === */
.product-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 30px;
}

.product-box {
    background-color: #ffffff;
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    padding: 15px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

/* .product-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
} */

/* === Product Details === */
.product-box img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
}

.product-box h4 {
    font-size: 18px;
    color: #222;
    margin-bottom: 8px;
}

.product-box p {
    font-size: 14px;
    color: #555;
    margin: 4px 0;
}

/* === Add to Cart Form === */
.product-box form {
    margin-top: 12px;
}
#add-to-cart-button{
  margin-left: 50px;
    margin-top: 10px;
}

.product-box label {
    font-size: 14px;
    margin-right: 5px;
}

.product-box input[type="number"] {
    width: 60px;
    padding: 5px;
    border-radius: 6px;
    border: 1px solid #ccc;
    text-align: center;
    margin-right: 10px;
    transition: all 0.2s ease;
}

.product-box input[type="number"]:focus {
    border-color: #007bff;
    outline: none;
}

.product-box button {
    background-color: #007bff;
    color: white;
    padding: 8px 14px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    transition: all 0.3s ease;
}

.product-box button:hover {
    background-color: #0056b3;
}

/* === Responsive Design === */
@media (max-width: 768px) {
    .main-container {
        flex-direction: column;
    }

    .side-bar {
        width: 100%;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        border-right: none;
        border-bottom: 1px solid #e5e5e5;
        box-shadow: none;
    }

    .side-bar a {
        margin: 5px;
        font-size: 14px;
        padding: 8px 12px;
    }

    .product-container {
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
    }
}

    </style>
</head>
<header>
    @include('templates.header')
</header>
<body>
    <div class="success">
        <div style="color: green;">
        {{ session('success') }}
        </div>
            
      
    <div class="main-container">
        <div class="side-bar">
            @auth()
@if (auth()->user()->isAdmin())
     <a href="{{ route('createproduct.index') }}">Create Product</a><br/>
@endif
               
                <a href="{{ route('productlist') }}">Product List</a><br/>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('category.index') }}">Create Category</a><br/>
                    <a href="{{ route('categorylist') }}">Category List</a><br/>
                @endif
                <a href="{{ route('cart.show') }}">View Cart</a><br/>
            @endauth

        </div>
        <div class="content-area">
            <h3>Dashboard</h3>
        <div>
            <div class="product-container">
                @foreach($products as $product)
                    <div class="product-box">
                        <img src="{{ asset('images/' . $product->product_image) }}" alt="{{ $product->product_name }}">
                        <h4>{{ $product->product_name }}</h4>
                        {{-- <p><strong>Quantity:</strong> {{ $product->product_quantity }}</p> --}}
                        <p><strong>Description:</strong> {{ $product->product_description }}</p>
                        <p><strong>Category:</strong> {{ $product->product_category }}</p>
                        <p><strong>Price:</strong> ${{ $product->product_price }}</p>
                        <form action="{{ route('cart.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" required>
                            <input type="hidden" id="product_id" name="product_id" value="{{$product->product_id}}">
                            <button id="add-to-cart-button" type="submit">Add to Cart</button>
                        </form>
                    </div>
                @endforeach
            </div>
            
        <br>
        </div>
        </div>

    </div>
<table>
</body>
<footer>
    @include('templates.footer')
</footer>   
</html>