<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
    @include('templates.header')
    </header>
    

    {{ session('success')}}

    <body>
        <h1>Cart List</h1>
        <table>
            <thead>
                <tr>
                    <th>Cart ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($cartItems as $cart)
                    <tr>
                        <td>{{ $cart->cart_id }}</td>
                        <td>{{ $cart->product->product_name}}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>{{ $cart->total_price }}</td>   
                        <td>
                            <form action="{{ route('cart.remove', $cart->cart_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="container">

        <div class="con">
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to clear the cart?')">Clear Cart</button>
        </form>
        </div>

        <div class="checkout">
            <a href="{{ route('checkout.index') }}"> Checkout</a>
        </div>
        </div>
    </body>

    <footer>
    @include('templates.footer')
    </footer>
    
</body>
</html>