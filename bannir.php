<?php
include('includes/database_handler.php');



if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupUser = $dbh->prepare("SELECT * FROM users  WHERE id = ? ");
    $recupUser->execute(array($getid));
    if ($recupUser->rowCount() > 0) {

        $bannirUser = $dbh->prepare("DELETE FROM users  WHERE id = ?");
        $bannirUser->execute(array($getid));

        header('location: membres.php?code=userdeleted');
    } else {
        echo "Aucun membre n'a été trouvé";
    }
} else {
    echo "l'identifiant n'a pas été récupereé ";
}
