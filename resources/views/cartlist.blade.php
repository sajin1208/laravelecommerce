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

                @foreach($carts as $cart)
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
        <a href="{{ route('checkout.success') }}">Proceed to Checkout</a>
        </div>
        </div>


        <div class="form-container">
            <form action="{{ route('checkout.success') }}" method="POST">
                @csrf
                <label for name="name">Name:
                <input type="text" id="name"/><br/>

                <label for name="email">Email:
                <input type="text" id="email"/><br/>

                <label for name="email">Phone-Number:
                <input type="number" id="phone"/><br/>
                
                <label for name="email">Payement Options:
                <select>
                    <option value="COD">COD</option>
                </select><br/>

                <input type="submit" value="Submit">
            </form>

        </div>

    </body>

    <footer>
    @include('templates.footer')
    </footer>
    
</body>
</html>