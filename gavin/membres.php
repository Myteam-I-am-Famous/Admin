<?php
include('includes/database_handler.php');

class User {
    
    static function select($uservalue) { 
    global $dbh; 
    if(isset($_GET['id']) AND !empty($_GET['id'])) { 
       $getid= $_GET['id'];     
      $users_select = $dbh->prepare("select * from utilisateurs  WHERE id = ?");
      $users_select->execute(array($getid));
      $users_select = $users_select->fetch();
      $users_select = $users_select[$uservalue];
	    }}
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les membres</title>
</head>
<body>
    <!--afficher tous les membres -->
   <?php 
     $recupUsers = $dbh->query('select * from users'); 
      while ($user = $recupUsers->fetch()){
          ?>
                <p><?= $user['email']; ?> <a href="profil.php?id=<?= $user['id']; ?>" style="color:blue;text-decoration:none;">Profil utilisateur
 <a href="bannir.php?id=<?= $user['id']; ?>" style="color:red ; text-decoration: none;">Supp DEF  le membre </a>

  <?php if($user['status'] == '4'):?>
                            <button type="submit"  name="unban" value="<?= $user['email'] ?>" class="btn btn-warning btn-xs">UnBan</button>
                        <?php else: ?>
                            <button type="submit" name="ban" value="<?= $user['email'] ?>" class="btn btn-warning btn-xs">ban</button>
                        <?php endif; ?></p>
 <?php 
      }
 ?>


</body>
</html>
