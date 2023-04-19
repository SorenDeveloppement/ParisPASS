<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cursor.css">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
</head>
<body>

    <form class="container" method="POST">
        <div class="card">
            <div class="username">
                <h2>Email</h2>
                <input type="email" name="email" id="email" placeholder="Email" class="field">
            </div>

            <br>

            <div class="password">
                <h2>Password</h2>
                <input type="password" name="password" id="password" placeholder="Password" class="field"><br><br>
                <input type="password" name="pass_conf" id="pass_conf" placeholder="Password check" class="field">
            </div>

            <a class="account" href="login.php">Vous avez déjà un compte? Connectez vous ici !</a>

            <button type="submit" name="submit" id="submit" class="submit">Register</button>
        </div>
    </form>

    <?php 
    
    if (isset($_POST['submit'])) {
        extract($_POST);
        $pass_conf = $_POST['pass_conf'];

        try{
            $db = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
        }
        catch(Exception $e){
            die('Erreur : '. $e->getMessage());
        }

        $options = [
            'cost' => 12,
        ];

        $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

        if (!empty($email) && !empty($password) && !empty($pass_conf)) {
            if ($password == $pass_conf) {
                try {
                    $q = $db->prepare("INSERT INTO `userslist`(`email`, `password`) VALUES (:email, :password)");
                    $q->execute([
                        'email' => $email,
                        'password' => $hashpass
                    ]);

                    $_SESSION['email'] = $email;
                    $_SESSION['logged'] = true;
                } catch(Exception $e){
                    echo ('Erreur : '. $e->getMessage());
                }

                header('Location: /');
                exit();
            } else {
                echo("The password and the password confirmation fields are not the same !");
            }
        } else {
            echo("Some fields are empty !");
        }
    }

    ?>
    
    <script src="js/trailing_cursor.js"></script>
    
</body>
</html>