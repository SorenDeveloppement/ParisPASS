<?php session_start() ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/card.css">
    <title>Paris CT Pass</title>

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
            <a href="login.php" class="bottom">Se connecter</a>
        </div>
    </div>

    <br><br><br><br><br><br>

    <article class="content">

        <span id="cards"></span>
        <br><br><br><br>

        <article class="cards-container">
            <h1>Mes cartes :</h1>
            <p>Vous ne possédez pas encore de carte Paris PASS</p>

            <div class="cards">
                <div class="card">
                    <div class="front-card card-box">
                        <img src="img/paris-pass.png" class="card-img">
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
                    <h1>Monument</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/monument.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1>Monument</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/monument.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1>Monument</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
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
                    <h1>Musée</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/monument.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1>Musée</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
            <article class="article">
                <img src="img/monument.png" style="width: 350px; height: 350px;" class="img">
                <div class="info">
                    <h1>Musée</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem iusto, error illum enim cupiditate modi eveniet. Vitae officiis, dolor, reiciendis labore illum perspiciatis voluptatum eos eaque enim maiores, velit autem?</p>
                </div>
            </article>
        </article>
    </article>
    
</body>
</html>