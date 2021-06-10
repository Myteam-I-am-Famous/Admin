<?php
include('../includes/functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher tous les articles</title>
    <link rel="stylesheet" type="text/css" href="./article.css" />
</head>

<body>

    <a href="../">Retour au panel administrateur</a>

    <div class="articles">
        <?php
        $recupArticles = $dbh->query("SELECT * FROM articles");
        while ($article = $recupArticles->fetch()) {
        ?>
            <div class="article">

                <div class="article-image">
                    <?php echo '<img src="assets/' . $article['image'] . '" alt="Image de profil">' ?>
                </div>

                <div class="article-content">
                    <h1><?= $article['title']; ?></h1>

                    <p><?= $article['content']; ?></p>
                </div>
                <div class="article-buttons">
                    <a href="supprimer_articles.php?id=<?= $article['id'];  ?>"><button id="delete-btn" class="article-button">Supprimer l'article</button> </a>
                    <a href="modifier_articles.php?id=<?= $article['id'];  ?>"><button id="modify-btn" class="article-button">Modiffier l'article</button> </a>
                    <a href="publierr_articles.php?id=<?= $article['id'];  ?>"><button id="modify-btn" class="article-button">Publier Article</button> </a>
                </div>
            </div>


        <?php
        }

        ?>
    </div>

</body>

</html>