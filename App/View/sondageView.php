<?php
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sondage</title>
    <link rel="stylesheet" href="css/sondage.css">
</head>
<body>
<?php
include ("include/header.php");
?>

<div class="contour">

    <form class="form" method="post">
        <p id="question">Que manger ce soir ?
        </p>
        <div class="line">
            <label for="response_1">Des pâtes</label>
            <input type="radio" class="radio" name="response" value="response_1"  id="response_1"/>
        </div>
        <div class="line">
            <label for="response_2">Pizza</label>
            <input type="radio" class="radio" name="response" value="response_2" id="response_2"/>
        </div>

        <input type="button" id="button" value="Envoyer"/>
    </form>

</div>

</body>
</html>
