<?php 

if (!isset($_SESSION)){
    session_start();
}

if (empty($_SESSION['logged'])) {
    $_SESSION['logged'] = false;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/cursor.css">
    <title>Paris CT Pass</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">

    <script>
        alert("Il s'agit d'un site fictif réalisé pour un projet d'anglais !")
    </script>
</head>
<body>

    <div class="top-bar">
        <img src="img/logo.png" class="left" style="width: 200px; height: 70px; margin-left: 15px; margin-top: 5px;">
        <h1 class="Center">Paris PASS</h1>
        <span></span>
    </div>

    <div class="menubtn">
        <div class="menu">
            <a href="#cards">Mes cartes</a>
            <a href="#monuments">Monuments</a>
            <a href="#museum">Musées</a>
            <a href="purchase.php" class="bottom purchase" style="margin-bottom: 50px;">Acheter une carte</a>
            <?php 

            if ($_SESSION['logged']) {
                echo "<a href=\"logout.php\" class=\"bottom\">Se déconnecter</a>";
            } else {
                echo "<a href=\"login.php\" class=\"bottom\">Se connecter</a>";
            }
        
            ?>
        </div>
    </div>

    <br><br><br><br><br><br>

    <article class="content">

        <span id="cards"></span>
        <br><br><br><br>

        <article class="cards-container">
            <h1>Mes cartes :</h1>
            <?php 
            
            if ($_SESSION['logged']) {
                echo "<p>Connecté</p>";
            } else {
                echo "<p>Vous n'êtes pas connectés</p>";
            }

            ?>
            <p>Vous ne possédez pas encore de carte Paris PASS</p>

            <div class="cards">
                <div class="card">
                    <div class="front-card card-box shine">
                        <div class="img-box">
                            <img src="img/paris-pass.png" class="card-img" style="--l: -75%;">
                        </div>
                    </div>
                    <div class="back-card card-box">
                        <div class="text-container">
                            <p class="card-text">Nom : DeTest</p>
                            <p class="card-text">Prénom : Test</p>
                            <p class="card-text">Crée le : 01/01/2023</p>
                        </div>
                        <p class="card-text center bottom-card">6uhi7 y7hb4 tyei5</p>
                    </div>
                </div>
            </div>
        </article>

        <span id="monuments"></span>
        <br><br><br><br>

        <article class="articles">
            <h1 class="h1">Monuments à visiter :</h1>
            <article class="article">
                <img src="img/monument.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Monument</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1079.8143028838053!2d2.294042832890576!3d48.85791246184352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1681906391394!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/monument.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Monument</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1079.8143028838053!2d2.294042832890576!3d48.85791246184352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1681906391394!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/monument.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Monument</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1079.8143028838053!2d2.294042832890576!3d48.85791246184352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1681906391394!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
        </article>

        <span id="museum"></span>
        <br><br><br><br>

        <article class="articles">
            <h1 class="h1">Musées à visiter :</h1>
            <article class="article">
                <img src="img/monument.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Musée</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1079.8143028838053!2d2.294042832890576!3d48.85791246184352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1681906391394!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/monument.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Musée</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1079.8143028838053!2d2.294042832890576!3d48.85791246184352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1681906391394!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/monument.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Musée</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1079.8143028838053!2d2.294042832890576!3d48.85791246184352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1681906391394!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
        </article>
    </article>

    <script src="js/trailing_cursor.js"></script>
    <!-- <script src="js/map.js"></script>
    
    <script>
        var purchase = document.querySelector(".purchase")

        purchase.addEventListener('click', (event) => {
            alert("Vous venez d'être débiter de 40€ pour l'achat d'un Paris PASS");
        });
    </script> -->
    
</body>
</html>