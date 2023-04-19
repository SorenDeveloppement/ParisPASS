<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cursor.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Purchase a card</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">
</head>
<body>

    <form class="container" method="POST">
        <div class="card">
            <div class="lastname">
                <h2>Last name</h2>
                <input type="text" name="lname" id="text" placeholder="Nom de famille" class="field">
            </div>

            <br>

            <div class="lastname">
                <h2>Name</h2>
                <input type="text" name="name" id="text" placeholder="Prénom" class="field">
            </div>

            <a class="account" href="index.php">Revenir à la page principale</a>

            <br>
            <button type="submit" name="submit" id="submit" class="submit">Créer une carte</button>
        </div>
    </form>
    
    <script src="js/trailing_cursor.js"></script>

    <?php 

    function guidv4($data = null) {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    
    if (isset($_POST['submit'])) {
        extract($_POST);

        try{
            $db = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
        }
        catch(Exception $e){
            die('Erreur : '. $e->getMessage());
        }

        if (!empty($lname) && !empty($name)) {
            try {
                $q = $db->prepare("INSERT INTO `cardslist`(`name`, `lastname`, `email`, `uuid`, `creation`) VALUES (:name, :lastname, :email, :uuid, :creation)");
                $q->execute([
                    'name' => $name,
                    'lastname' => $lname,
                    'email' => $_SESSION['email'],
                    'uuid' => guidv4(),
                    'creation' => date("d-m-Y")
                ]);
                
            } catch(Exception $e){
                echo ('Erreur : '. $e->getMessage());
            }

            header('Location: /');
            exit();
        } else {
            echo("Some fields are empty !");
        }
    }

    ?>
    
    
</body>
</html>