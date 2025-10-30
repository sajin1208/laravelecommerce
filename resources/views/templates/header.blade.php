<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" rel="stylesheet">
    <style>
        .top-nav-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #f8f8f8;
    padding: 10px 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.top-image img {
    display: block;
}

.top-menu {
    flex: 1;
    text-align: center;
}

.top-menu a {
    margin: 0 15px;
    text-decoration: none;
    color: #333;
    font-weight: 500;
    transition: color 0.3s;
}

.top-menu a:hover {
    color: #007bff;
}

.auth-links {
    display: flex;
    align-items: center;
    gap: 10px;
}

.auth-links a,
.auth-links button {
    text-decoration: none;
    background-color: #007bff;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.auth-links a:hover,
.auth-links button:hover {
    background-color: #0056b3;
}        
        </style>
</head>
<body>
        <div class="top-nav-bar">
            <div class="top-image">
                <img src="/images/shop.jpg" alt="home" width="70" height="60">
            </div>

            <div class="top-menu">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/">Product</a>
            <a href="/about">About</a>
            <a href="/">Contact</a>
            </div>

            <div class="auth-links">
                <div class="cart-icon">
                    <a href="{{ route('cart.show')}}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <sup><span class="cart-count">0</span></sup>
                    </a>
                </div>

            @if(Auth::check())
            <span>Welcome, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit">Logout</button> 
            </form>
            @else

            <a href="{{ route('login') }}" style="display:inline;">Login/Register</a>
            @endif
            </div>
        </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        function updateCartCount(){
            $.ajax({
                url: "{{ route('cart.count')}}",
                type: "GET",
                success: function(data){
                    $('.cart-count').text(data.count);
                },
                error: function(){
                }
            });
        }

        updateCartCount();
    }
);
        
</script>    
</html>