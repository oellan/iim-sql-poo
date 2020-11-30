<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/friends?t=<?php echo time(); ?>.css">

</head>
<body>

<div class="contour">

    <h1>Recherchez des amis</h1>

    <form class="form" method="post">
        <input type="text" id="name" name="user_key"  placeholder="Pseudo" />
        <input type="submit" id="button" name="search_submit" value="Rechercher"/>
    </form>

    <tr>
        <tr>
            <?php

            foreach($users as $user)
            {
                if((int)$user['id'] === $_SESSION['id'] || in_array($user['username'], $friends)) continue;
                ?>

                <form method="post">
                    <input type="hidden" name="user_id" value="<?=$user['id']?>">
                    <td><?=$user['username']?></td>
                    <td><button type="submit" name="add_submit">Ajouter</button></td>
                </form>

                <?php
            }

            ?>
        </tr>
    </table>

    <p>
        <?php

            if($msg !== null) echo $msg;

        ?>
    </p>

</div>

</body>
</html>
