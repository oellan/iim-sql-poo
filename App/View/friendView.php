<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recherche d'amis</title>
    <link rel="stylesheet" href="css/friends.css">

</head>
<body>
<?php
include ("include/header.php");
?>
<div class="contour">

    <h1>Recherchez des amis</h1>

    <form class="form" method="post">
        <input type="text" id="name" name="user_key"  placeholder="Pseudo" />
        <input type="submit" id="button" name="search_submit" value="Rechercher"/>
    </form>

    <table>

        <?php

        foreach($users as $user)
        {
            if((int)$user['id'] === $_SESSION['id'] || in_array($user['id'], $friends)) continue;
            ?>
            <tr>
                <form method="post">
                    <input type="hidden" name="user_id" value="<?=$user['id']?>">
                    <td><?=$user['username']?></td>
                    <td><button type="submit" name="add_submit">Ajouter</button></td>
                </form>
            </tr>

            <?php
        }

        ?>
    </table>

    <p>
        <?php

            if($msg !== null) echo $msg;

        ?>
    </p>

</div>

<div class="contour">

    <h1>Vos amis</h1>

    <table>

        <?php

        if(!empty($friends)) {

            foreach($friends as $friend_id)
            {
                $friend = $this->model->getUserBy('id', $friend_id)
                ?>
                <tr>
                    <form method="post">
                        <input type="hidden" name="user_id" value="<?=$friend['id']?>">
                        <td><?=$friend['username']?></td>
                        <td><button type="submit" name="delete_submit">Supprimer</button></td>
                    </form>
                </tr>

                <?php
            }

        }else echo '<p>Aucun amis</p>';

        ?>
    </table>

</div>

</body>
</html>
