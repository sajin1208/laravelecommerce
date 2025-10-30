<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <div class="top-nav-bar">
            <a href="/">Home</a>
            <a href="/about">About</a>
             <a href="/">Product</a>
            <a href="/about">About</a>
             <a href="/">Contact</a>
        </div>
        <div class="breadcrumb">
            {{-- <img src="/images/RPLL.jpg" alt="home"> --}}
            
        </div>

<a href="{{ route('createproduct.index') }}">Create Product</a>
<a href="{{ route('productlist') }}">Product List</a>


</body>
    
</html>