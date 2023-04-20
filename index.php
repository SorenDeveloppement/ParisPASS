<?php 

if (!isset($_SESSION)){
    session_start();
}

if (empty($_SESSION['email'])) {
    $_SESSION['email'] = "";
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
            <a href="#ppass">La carte</a>
            <a href="#monuments">Monuments</a>
            <a href="#museum">Musées</a>
            <a href="#others">Autres</a>
            <?php 

            if ($_SESSION['logged']) {
                echo "<a href=\"purchase.php\" class=\"bottom purchase\" style=\"margin-bottom: 50px;\">Acheter une carte</a>";
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
            <h1 class="h1">Mes cartes :</h1>
            <?php 
            
            if (!$_SESSION['logged']) {
                echo "<p style=\"margin-left: 10px;\">Vous n'êtes pas connectés</p>";
            }

            try {
                $db = new PDO('mysql:host=localhost;dbname=users;charset=utf8', 'root', '');
            } catch(Exception $e) {
                die('Erreur : '.$e->getMessage());
            }

            $q = $db->prepare("SELECT * FROM `cardslist` WHERE email = :email");
            $q->execute(['email' => $_SESSION['email']]);
            $cards = $q->fetchAll();

            if (empty($cards) && $_SESSION['logged']) {
                echo "<p style=\"margin-left: 10px;\">Vous ne possédez pas encore de carte Paris PASS</p>";
            }

            foreach($cards as $card) : ?>
                <div class="cards">
                    <div class="card">
                        <div class="front-card card-box shine">
                            <div class="img-box">
                                <img src="img/paris-pass.png" class="card-img" style="--l: -75%;">
                            </div>
                        </div>
                        <div class="back-card card-box">
                            <div class="text-container">
                                <p class="card-text">Nom : <?php echo $card['lastname'] ?></p>
                                <p class="card-text">Prénom : <?php echo $card['name'] ?></p>
                                <p class="card-text">Crée le : <?php echo $card['creation'] ?></p>
                            </div>
                            <!-- <p class="card-text center bottom-card"><?php echo $card['uuid'] ?></p> -->
                            <img alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=<?php echo $card['uuid'] ?>&code=&translate-esc=true' style="width: 100%;" class="bottom-card"/>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </article>

        <span id="ppass"></span>
        <br><br><br><br>

        <article class="articles">
            <h1 class="h1">La carte</h1>
            <article style="margin-left: 10px;">
                <h3>Qu'est ce que la carte Paris PASS ?</h3>
                <br>
                <p>La carte est valable pendant une durée de <span class="evidence">7 jours</span> après activation</p>
                <p>La carte permet de : </p>
                <p><span style="padding-left: 20px;">Visiter les <span class="evidence">15 monuments et musées</span> listés ci-dessous</span></p>
                <p><span style="padding-left: 20px;">Prendre le <span class="evidence">métro</span> pendant votre séjour</span></p>
                <p>Son coût : <span class="evidence">100&euro;</span></p>
            </article>
        </article>

        <span id="monuments"></span>
        <br><br><br><br>

        <article class="articles">
            <h1 class="h1">Monuments à visiter :</h1>
            <article class="article">
                <img src="img/eiffel.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Tour Eiffel</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1079.8143028838053!2d2.294042832890576!3d48.85791246184352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e2964e34e2d%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1681906391394!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/triomphe.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Arc de Triomphe</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.182614260397!2d2.2928441802667803!3d48.87379520767707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fec70fb1d8f%3A0xd9b5676e112e643d!2sArc%20de%20Triomphe!5e0!3m2!1sfr!2sfr!4v1681999151517!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/versaille.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Château de Versaille</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2627.7961865910584!2d2.118172080264935!3d48.80486841252898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67d94d7b14c75%3A0x538fcc15f59ce8f!2sCh%C3%A2teau%20de%20Versailles!5e0!3m2!1sfr!2sfr!4v1681999182178!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/pierrefonds.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Château de Pierrefonds</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2599.2731476141275!2d2.9779997802793674!3d49.34697847423469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e87dc1fec272d9%3A0xbfdf37121fc47502!2sCh%C3%A2teau%20de%20Pierrefonds!5e0!3m2!1sfr!2sfr!4v1681999238406!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/invalides.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Les Invalides</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.1102844831375!2d2.3127828999999975!3d48.85610735000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fd7b98f3053%3A0x455a14459c80c16a!2sH%C3%B4tel%20des%20Invalides!5e0!3m2!1sfr!2sfr!4v1681999313256!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/notre_dame.jpeg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Notre Dame</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10501.224734075146!2d2.3439266019344607!3d48.85237153943195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671e19ff53a01%3A0x36401da7abfa068d!2sCath%C3%A9drale%20Notre-Dame%20de%20Paris!5e0!3m2!1sfr!2sfr!4v1681999342739!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/opera.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Opéra de Paris</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d42004.84441050952!2d2.3177264019739443!3d48.85243652945588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fa68d1bb531%3A0x73b120cb2e88d800!2sOpera%20National%20de%20Paris!5e0!3m2!1sfr!2sfr!4v1681999387591!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/conciergerie.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Conciergerie</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.11513205755!2d2.3433119802662854!3d48.856014908929126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1fd8767d47%3A0x90ca4b466cb6316a!2sConciergerie!5e0!3m2!1sfr!2sfr!4v1681999418009!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
        </article>

        <span id="museum"></span>
        <br><br><br><br>

        <article class="articles">
            <h1 class="h1">Musées à visiter :</h1>
            <article class="article">
                <img src="img/louvre.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Musée du Louvre</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.874101278918!2d2.337644000000004!3d48.860611100000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671d877937b0f%3A0xb975fcfa192f84d4!2sMus%C3%A9e%20du%20Louvre!5e0!3m2!1sfr!2sfr!4v1681999454874!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/mnhm.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Musée National d'Histoire Naturelle</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.7769502086658!2d2.3613054802659583!3d48.843393109817754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671f12d404411%3A0x4743d62149f1c6e1!2sMNHN%20Mus%C3%A9um%20National%20d&#39;Histoire%20Naturelle!5e0!3m2!1sfr!2sfr!4v1681999487935!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/pompidou.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Centre Pompidou</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.8722967792664!2d2.350061680266429!3d48.86064550860313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e1c09b820a3%3A0xb7ac6c7e59dc3345!2sLe%20Centre%20Pompidou!5e0!3m2!1sfr!2sfr!4v1681999542682!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/monument.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Musée Méliès</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2626.1032453305284!2d2.3801370802658197!3d48.837169310255916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e673db8db60a45%3A0x3e4c66100a94da0a!2zTXVzw6llIE3DqWxpw6hz!5e0!3m2!1sfr!2sfr!4v1681999571981!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/air.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Musée de l'aire et de l'espace</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2620.36210772292!2d2.43243498026869!3d48.9465905025476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478b082ab1d8decb%3A0x2de483e2dcd4c0b8!2sMus%C3%A9e%20de%20l&#39;Air%20et%20de%20l&#39;Espace!5e0!3m2!1sfr!2sfr!4v1681999750424!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
        </article>

        <span id="others"></span>
        <br><br><br><br>

        <article class="articles">
            <h1 class="h1">Autres : </h1>
            <article class="article">
                <img src="img/mouche.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Bateau Mouche</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.6958158103853!2d2.3059374!3d48.86401059999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fda56cd2849%3A0xeb1543c56c29aad3!2sBateaux-Mouches!5e0!3m2!1sfr!2sfr!4v1681999792532!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/bus.jpg" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1 class="bat-name">Visite en bus</h1>
                    <iframe class="i-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d167997.36225560424!2d2.2072961991030384!3d48.8589963069071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e36a09e18d3%3A0xb44edcd93abf8977!2sTootbus%20Paris%2C%20bus%20hop-on%20hop-off!5e0!3m2!1sfr!2sfr!4v1681999836910!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <p class="bat-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
        </article>
    </article>

    <script src="js/trailing_cursor.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("a").hover(function(){
                $('.white').css("transform", "scale(1.5)");
                $('.white').css("opacity", ".8");
                $('.red').css("transform", "scale(2)");
                $('.red').css("opacity", ".6");
            },
            function() {
                $('.white').css("transform", "scale(1)");
                $('.white').css("opacity", "1");
                $('.red').css("transform", "scale(1)");
                $('.red').css("opacity", "1");
            });
        });
    </script>
    <!-- <script src="js/map.js"></script>
    
    <script>
        var purchase = document.querySelector(".purchase")

        purchase.addEventListener('click', (event) => {
            alert("Vous venez d'être débiter de 40€ pour l'achat d'un Paris PASS");
        });
    </script> -->
    
</body>
</html>