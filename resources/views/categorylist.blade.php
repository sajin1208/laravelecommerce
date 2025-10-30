<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<header>
    @include('templates.header')
</header>

<body>
    <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th rowspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
               <td>{{ $category->category_id }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->category_description }}</td>
                {{-- <td>
                    <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td> --}}
            <td>
                        <a href="{{ route('category.edit', ['id' => $category->category_id]) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('category.remove', $category->category_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                        </form>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
<footer>
    @include('templates.footer')
</footer>
</html>
