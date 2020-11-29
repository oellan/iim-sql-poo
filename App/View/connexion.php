<?php
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="/Public/css/connexion.css">
    <title>Connexion</title>
</head>
<body>
    <h1>Connectez-vous</h1>

    <form class="form" method="post">
        <input type="text" id="name" name="user_name"  placeholder="Votre pseudo" />
        <input type="password" id="password" name="user_password"  placeholder="Mot de passe" />
        <input type="button" id="button" value="Me connecter"/>
    </form>
</body>
</html>
