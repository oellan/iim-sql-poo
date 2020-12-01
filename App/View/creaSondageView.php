<?php
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crée ton sondage</title>
    <link rel="stylesheet" href="css/creaSondage.css">
</head>
<body>

<?php
include ("include/header.php");
?>

<div class="contour">

    <h1>Crée ton propre sondage !</h1>

    <form class="form" method="post">
        <label for="titre" >Titre:</label>
        <input type="text" id="titre"/>
        <label for="response_1" >Réponse 1:</label>
        <input type="text" id="response_1"/>
        <label for="response_2" >Réponse 2:</label>
        <input type="text" id="response_2"/>

        <input type="submit" id="button" value="Demander à mes amis"/>
    </form>
</div>

</body>
</html>
