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
    


        <div class="orders-container">
            <form action= {{route('checkout')}} method="POST">
                        @csrf

            <label for name="name">Name:
            <input type="text" id="user_name" name="name"><br/>

             <label for name="email">Email:
            <input type="text" id="user_email" name="email">
            @error('email')
                <p class="bg-red">{{$message}}</p>
            @enderror
            <br/>

             <label for name="phone_number">Phone Number:
            <input type="text" id="user_phone_number" name="phone_number"> <br/>

             <label for name="select">Payment Mode:
                <select id="payment_mode" name="payment_mode">
                    <option value="COD">COD</option>
                </select><br/>

                        <button type="submit">Confirm Order</button>

            </form>
        </div><br/>
</div>
</body>
</html>