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
        <p id="question"><?=$poll[0]['title']?>
        </p>
        <div class="line">
            <label for="response_1"><?=$responses[0]?></label>
            <input required type="radio" class="radio" name="response" value="0"  id="response_1"/>
        </div>
        <div class="line">
            <label for="response_2"><?=$responses[1]?></label>
            <input required type="radio" class="radio" name="response" value="1" id="response_2"/>
        </div>

        <input type="submit" id="button" value="Envoyer" name="response_submit"/>
    </form>

    <p>
        <?php

        if($msg != null) echo $msg;

        ?>
    </p>

</div>
    <?php include_once 'include/heartbeat_script.php' ?>
</body>
</html>
