<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #343a40;
            color: #ffffff;
        }
        .container {
            margin-top: 100px;
        }
        .card {
            background-color: #495057;
            border: none;
        }
        .card-header {
            background-color: #212529;
            border-bottom: none;
        }
        .form-control {
            background-color: #6c757d;
            border: none;
            color: #ffffff;
        }
        .form-control:focus {
            background-color: #6c757d;
            color: #ffffff;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .logo {
            font-size: 50px;
            margin-bottom: 20px;
            color: #ffffff;
        }
        .register-link {
            color: #ffffff;
            text-align: center;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <i class="fas fa-user logo"></i>
                    <h2>Login</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                    <a href="{{ route('register.form') }}" class="register-link">Don't have an account? Register here</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>