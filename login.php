<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/cursor.css">
    <title>Login</title>
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
                <input type="password" name="password" id="password" placeholder="Password" class="field">
            </div>

            <a class="account" href="register.php">You don't have an account ? Create one here !</a>

            <br>
            <button type="submit" name="submit" id="submit" class="submit">Login</button>
        </div>
    </form>

    <script src="js/trailing_cursor.js"></script>
    <?php 

    try{
        $db = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
    }
    catch(Exception $e){
        die('Erreur : '. $e->getMessage());
    }

    if (isset($_POST['submit'])) {

        extract($_POST);

        if (!empty($email) && !empty($password)) {
            
            try {
                $q = $db->prepare("SELECT * FROM `userslist` WHERE email = :email");
                $q->execute(['email' => $email]);
                $result = $q->fetch();
            } catch(Exception $e){
                echo ('Erreur : '. $e->getMessage());
            }
            
            try {
                if ($result == true) {
                    if (password_verify($password, $result['password'])) {
                        $_SESSION['email'] = $result['email'];
                        $_SESSION['logged'] = true;

                        header('Location: /');
                        exit();
                    } else {
                        echo '<p>Le mot de passe n\'est pas bon</p>';
                        return;
                    }
                } else {
                    echo '<p>Le compte n\'existe pas</p>';
                    return;
                }
            } 
            catch(Exception $e){
                echo ('Erreur : '. $e->getMessage());
            }
            

        } else {
            echo '<p> Certains champs sont incomplets</p>';
            return;
        }

    }

    ?>
    
    
</body>
</html>