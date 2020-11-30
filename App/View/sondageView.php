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

<div class="contour">

    <form class="form" method="post">
        <p id="question">Qui a inventé les transports en communs modernes ?
        </p>
        <div class="line">
            <label for="response_1">Séraphin Lampion</label>
            <input type="radio" class="radio" name="response" value="response_1"  id="response_1"/>
        </div>
        <div class="line">
            <label for="response_2">Blaise Pascal</label>
            <input type="radio" class="radio" name="response" value="response_2" id="response_2"/>
        </div>
        <div class="line">
            <label for="response_3">René Descartes</label>
            <input type="radio" class="radio" name="response" value="response_3"  id="response_3"/>
        </div>
        <div class="line">
            <label for="response_4">Séraphin Lampion</label>
            <input type="radio" class="radio"  name="response"value="response_4" id="response_4"/>
        </div>

        <input type="button" id="button" value="Envoyer"/>
    </form>

</div>

</body>
</html>
