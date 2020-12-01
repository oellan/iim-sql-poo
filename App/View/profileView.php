

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
    <link rel="stylesheet" href="css/profil.css">
</head>
<body>
<?php
include ("include/header.php");
?>

<div class="contour">
        <h1>Mon profil</h1>

    <div class="infos">

        <form method="post">
            <p class="titre_infos">Mes informations :</p>
            <div class="line">
                <p>Pseudo: <span class="pseudo"><?=$user['username']?></span></p>
                <input class="change" type="text" name="change_username_value" placeholder="Pseudo"/>
                <input type="submit" id="button" name="change_username_submit" value="Changer"/>
            </div>

            <div class="line">
                <p>Mail: <span class="mail"><?=$user['email']?></span></p>
                <input class="change" type="email" name="change_email_value" placeholder="Email"/>
                <input type="submit" id="button" name="change_email_submit" value="Changer"/>
            </div>

            <div class="line">
                <p>Password: <span class="mail">*********</span></p>
                <input class="change" type="password" name="change_password_value" placeholder="Mot de passe"/>
                <input type="submit" id="button" name="change_password_submit" value="Changer"/>
            </div>
        </form>
    </div>

    <p>
        <?php

        if(isset($msg)) echo $msg;

        ?>
    </p>

</div>

</body>
</html>
