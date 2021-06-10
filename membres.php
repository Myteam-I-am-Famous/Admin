<?php
include('includes/database_handler.php');
       global  $dbh;
      if(isset($_GET['status']) AND !empty($_GET['status']) ) {
        $getstatus = $_GET['status'];
        $userstatus= $dbh -> prepare("SELECT status FROM users where status = 4");
        $userstatus->execute(array('status' => 4));
        $banniruser = $userstatus->fetch();
       var_dump($banniruser);
         if($banniruser['status'] == 4){
            
       
             header('location: ../login.php');
             exit;
         }
       

      }else{
          echo"Aucun status trouvé";
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
                <h3><?= $user['email']; ?> <a href="profil.php?id=<?= $user['id']; ?>" style="color:blue;text-decoration:none;">Profil utilisateur
 <a href="bannir.php?id=<?= $user['id']; ?>" style="color:red ; text-decoration: none;">Supp DEF  le membre </a>

  <?php if($user['status'] == '4'):?>
                            <button type="submit"  name="unban" value="<?= $user['email'] ?>" class="btn btn-warning btn-xs">UnBan</button>
                        <?php else: ?>
                            <button type="submit" name="ban" value="<?= $user['email'] ?>" class="btn btn-warning btn-xs">ban</button>
                        <?php endif; ?></h3>
 <?php 
      }
 ?>


</body>
</html>
