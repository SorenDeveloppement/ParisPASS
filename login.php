<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cursor.css">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <div class="card">
            <div class="username">
                <h2>Email</h2>
                <input type="email" name="email" id="email" placeholder="Email" class="field">
            </div>

            <br>

            <div class="password">
                <h2>Password</h2>
                <input type="password" name="pass" id="pass" placeholder="Password" class="field">
            </div>

            <a class="account" href="register.php">Vous n'avez pas de compte? Créez en un ici !</a>

            <br>
            <input type="submit" class="submit" value="Login">
        </div>
    </div>
    
    <script src="js/trailing_cursor.js"></script>
    
</body>
</html>