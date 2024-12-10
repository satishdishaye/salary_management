<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #007bff;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .form-footer {
            text-align: center;
            margin-top: 10px;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Login Form -->
    <div class="form-container">
        <h2>Admin Login</h2>
        <form method="POST" action="{{route("admin-login-post")}}">
 
            @csrf


        <!-- Common errors placeholder -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

            <div class="form-group">
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" value="{{('email')}}" name="email" placeholder="Enter your email" >
            </div>
            @if ($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
             @endif

            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password" value="{{('password')}}" placeholder="Enter your password" >
            </div>

            @if ($errors->has('password'))
            <div class="error">{{ $errors->first('password') }}</div>
             @endif


            <button type="submit" class="btn">Login</button>
            
        </form>
    </div>

  
</body>
</html>
