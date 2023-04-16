<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Register</title>
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
                <input type="password" name="pass" id="pass" placeholder="Password" class="field"><br><br>
                <input type="password" name="pass" id="pass" placeholder="Password check" class="field">
            </div>

            <a class="account" href="login.php">Vous avez déjà un compte? Connectez vous ici !</a>

            <input type="submit" class="submit" value="Register">
        </div>
    </div>
    
</body>
</html>