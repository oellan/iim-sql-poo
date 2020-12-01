

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

    <h1>Vous avez eu <span id="result">faux</span> !</h1>

    <div class="com">

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
