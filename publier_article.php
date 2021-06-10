<?php
include('includes/functions.php');

if(isset($_POST['envoi'])){

    if(!empty($_POST['titre']) || !empty($_POST['description']) ||empty($_POST['img']) || !empty($_POST['img'])){

        $titre = htmlspecialchars($_POST['titre']);
        $description = nl2br(htmlspecialchars($_POST['description']));
        $img = htmlspecialchars($_POST['img']);

        $insertArticle = $dbh->prepare('INSERT INTO articles(id, title, content, image) VALUES(?, ? ,? ,?)');
        $insertArticle->execute(array(getMaxID('articles') + 1,$titre, $description,$img));


        echo "l'article a bien été envoyé";
    

    }else{
       echo "Veuillez compléter tous les champs ";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Publier un article </title>
    <link rel="stylesheet" type="text/css" href="article.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

	<br><br>

	<a href="adminboard.php">Retour au panel d'administration</a>

	<br><br>

	<a href="articles.php">Acceder aux articles</a>

	<br><br>

            <form method="post" action="">
       <input type="text" name="titre">
       <br>
       <textarea name="description" ></textarea>
       <br>
       <input type="file" name="img" accept="image/gif,image/png, image/jpeg,">
       <br>
       <input type="submit" name="envoi">
      </form>


</body>
</html>
