<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>Résultat du sondage</title>
    <link rel="stylesheet"
          href="css/sondageResult.css">
</head>
<body>
    <?php
    include("include/header.php");
    ?>

    <div class="contour">

        <h1>Votre vote a été pris en compte!</h1>

        <div class="responses">

        <?php if($msg != null) echo '<p>'.$msg.'</p>'; ?>

        <p id="response_1"><?= $result['r1']['title'] . ': ' . $result['r1']['q'] . ' (' . $result['r1']['p'] . '%)' ?></p>
        <p id="response_2"><?= $result['r2']['title'] . ': ' . $result['r2']['q'] . ' (' . $result['r2']['p'] . '%)' ?></p>

            <h2>Commentaires :</h2>

        <form method="post">
            <input required type="email" name="share_email" placeholder="Email">
            <input type="submit" id="button" name="share_submit" value="Partager"/>
        </form>

        <form class="write_com" method="post">
            <textarea id="com_content" name="com_content" placeholder="Ecrire un commentaire"></textarea>
            <input type="submit" id="button" name="com_submit" value="Envoyer"/>

        </form>

        <div class="show_com">
            <?php
            foreach ($comments as $comment):
                ?>
                <div class="comment">
                    <div class="author">Pseudo: <?= $comment['username'] ?></div>
                    <div class="content">Message: <?= $comment['content'] ?></div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
    <script>
        function updateResponses() {
            fetch('?page=getResultsApi&id=' + <?= $_GET['id'] ?>, {
                method: 'GET'
            })
                .then((response) => response.json())
                .then((data) => {
                    const voteTotal = data[0]['votes'] + data[1]['votes'];
                    [0, 1].forEach((id) => {
                        const responseElement = document.getElementById('response_' + (id + 1));
                        responseElement.innerText = `${data[id]['content']}: ${data[id]['votes']} (${data[id]['votes'] / voteTotal * 100}%)`;
                    })
                    setTimeout(updateResponses, 3000);
                })
        }

        updateResponses()
    </script>
    <?php include_once 'include/heartbeat_script.php' ?>
</body>
</html>
