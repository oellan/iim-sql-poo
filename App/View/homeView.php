<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
</head>
<body>

    <main>
        <?php
            if($this->auth->islogged()){
                echo '<a href="?page=logout">Se déconnecter</a><br>';
                echo '<a href="?page=friendssearch">Ajouter un ami</a>';
            }
            else echo '<a href="?page=login">Se connecter</a>/<a href="?page=register">S\'enregistrer</a>';
        ?>
    </main> 

</body>
</html>
