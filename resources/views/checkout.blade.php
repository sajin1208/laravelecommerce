<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
</head>
<body>
    <div>
        <h3>Order Summary</h3>
    </div>
   <div style="color: green;">
        {{ session('checkoutsuccess') }}   

    </div>
    
    <table border="1">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $index => $cart)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ $cart->product->product_name }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>{{ $cart->total_price }}</td>
                </tr>
            @endforeach
        </tbody>

        <div class="orders-container">
            <label for name="name">Name:
            <input type="text" id="name">
        </div>
<div class="checkform">
    <form action="{{ route('checkout.success') }}" method="POST">
        @csrf
        <button type="submit">Confirm Order</button>
</div>
</body>
</html>