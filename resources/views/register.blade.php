<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #74b9ff, #a29bfe);
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    form {
      background: #fff;
      padding: 40px 50px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
      width: 360px;
      text-align: center;
    }

    form p {
      background-color: #dff9fb;
      color: #2d3436;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 15px;
      font-weight: 500;
    }

    label {
      display: block;
      text-align: left;
      font-weight: 500;
      color: #2d3436;
      margin-bottom: 6px;
      margin-top: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1em;
      transition: border-color 0.3s;
    }

    input:focus {
      border-color: #0984e3;
      outline: none;
    }

    button {
      width: 100%;
      background-color: #0984e3;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 6px;
      font-size: 1em;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #74b9ff;
    }

     legend {
      font-size: 1.6em;
      font-weight: bold;
      color: #2d3436;
      margin-bottom: 20px;
      text-align: center;
    }
  </style>
</head>
<body>
    @if (session('success'))
    <p>{{ session('success') }}</p>
@endif
    <form method="POST" action="{{ route('register.submit') }}">
            <legend>Register Form</legend>

            @csrf

        <label for ="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>   
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="password_confirmation">Confirm Password:</label>
<input type="password" id="password_confirmation" name="password_confirmation" required>
        <br>
        <button type="submit">Register</button>        
    </form>

</body>
</html>