<?php
?>
<head>
    <link rel="stylesheet" href="css/header.css">
</head>
<header>
    <nav class="links">

        <a class="link" href="?page=home">Home</a>
        <?php
        if($this->auth->islogged()){
            echo '<a class="link" href="?page=logout">Se déconnecter</a>';
            echo '<a href="?page=friendssearch">Amis</a>';
            echo '<a href="?page=profil">Mon profil</a>';
            echo '<a href="?page=creaSondage">Créer un sondage</a>';
        }
        else echo '<a class="link" href="?page=login">Se connecter</a><a href="?page=register">S\'enregistrer</a>';
        ?>

    </nav>
</header>
