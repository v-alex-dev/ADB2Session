<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/index.css">
    <title><?=$title?></title>
</head>
<body>
    <!-- barre de navigation -->
    <nav>
        <div><a href="#">Accueil</a></div>
        <div class="menu">
            <ul class="login">
                <li><a href="#">Login</a></li>
                <li><a href="#">Admin</a></li>
            </ul>
        </div>
    </nav>
    <!-- Articles mis en avant -->
    <section class="news">
        <div>
            <div class="first">First news</div>
            <div>
                <div class="second">Second news</div>
                <div class="third">Third news</div>
            </div>
        </div>
    </section>
    <!-- les 6 derniers articles avec la liste catégorie -->
    <section class="articles">
        <div>
            <ul>
                <li><a href="#">Vlog</a></li>
                <li><a href="#">Actualités</a></li>
                <li><a href="#">Cinéma</a></li>
                <li><a href="#">Event</a></li>
                <li><a href="#">Gaming</a></li>
            </ul>
        </div>
        <div class="sixArticle">
            <div>Article One</div>
            <div>Article Two</div>
            <div>Article Three</div>
            <div>Article Four</div>
            <div>Article Five</div>
            <div>Article Six</div>
        </div>
    </section>
    <footer class="footer">
    <p>2021 &copy; by Vens Alexandre</a></p>
    </footer>
</body>
</html>