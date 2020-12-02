<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/home.css">

</head>
<body>
 <?php
    include ("include/header.php");
 ?>

<main>
    <div class="top_main">
        <h1>Bienvenue sondeur !</h1>
    </div>

    <?php if(!$this->auth->islogged()) {?>
        <p>Vous devez vous connecter pour voir les sondages!</p>
    <?php } else { ?>

        <section class="sondages_amis">

            <p class="titre_sondage_amis">Sondages de vos amis</p>

            <?php

                foreach($values['polls'] as $poll){
                    if(!empty($values['friends_id']) && in_array($poll['author_id'], $values['friends_id'])){
                        ?>

                            <div>
                                <h2><?=$poll['title']?></h2>
                                <a href="<?=$this->getPath('poll_responses', ['id' => $poll[0]])?>">Répondre</a>
                            </div>

                        <?php
                    }
                }

            ?>

        </section>
        <section class="sondages_passer">

            <p class="titre_sondage_passer">Sondages récents</p>

        </section>

    <?php } ?>

</main>
    <?php include_once 'include/heartbeat_script.php' ?>
</body>
</html>
