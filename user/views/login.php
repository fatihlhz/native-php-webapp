<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            max-width: 400px;

        }
        .geser-gambar {
            width: 100%;
            height: 100%;
        }
        .label{
            font-weight: bold;
        }
        .btn{
            width: 80%;
            margin-top: 20px;
            color: white;
            background-color: #193243;
        }
    </style>
</head>
<body>
    <div class="w: 100wh; d-flex justify-content-center align-items-center" style="background-color: #FF7F3E; height: 100vh">
        <div class="container login-container ">
            <img src="/native-php-webapp/user/public/img/logo-web.png" alt="" class="geser-gambar" >
            <!-- <h2 class="text-center">Login</h2> -->
            <form action="login" method="post">
                <div class="form-group">
                    <label for="email" class="label">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password" class="label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn " style="border-radius: 20px">Login</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
