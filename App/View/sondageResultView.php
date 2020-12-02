

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Résultat du sondage</title>
    <link rel="stylesheet" href="css/sondageResult.css">
</head>
<body>
<?php
include ("include/header.php");
?>

<div class="contour">

    <h1>Votre vote a été pris en compte!</h1>

    <div class="com">

        <p><?= $result['r1']['title'].': '.$result['r1']['q'].' ('.$result['r1']['p'].'%)'?></p>
        <p><?= $result['r2']['title'].': '.$result['r2']['q'].' ('.$result['r2']['p'].'%)'?></p>

        <h2>Commentaires :</h2>

        <div class="write_com">
            <textarea id="com_content" name="com_content" placeholder="Ecrire un commentaire"></textarea>
            <input type="button" id="button" value="Envoyer"/>

        </div>

        <div class="show_com">

        </div>



    </div>
</div>



</body>
</html>
