<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
    
</head>
<body>
    <div style="color: green;">
        {{ session('success') }}   

    </div>

    @if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container">
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
            <label for="name">Category Name</label>
            <input type="text" class="form-control" id="category_name" name="category_name" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="category_description" name="category_description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Category</button>
    </form>
</div>
</body>
</html>