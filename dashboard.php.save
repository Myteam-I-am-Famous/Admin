<?php
include('includes/database_handler.php');
include('./online.php');
    function incrementer_compteur(string $fichier): void {
    $compteur = 1;
    if (file_exists($fichier)) {
        $compteur = (int)file_get_contents($fichier);
        $compteur++;


        $file = fopen($fichier, 'w');
        fwrite($file, $compteur);

        fclose($file);
    } else {
        file_put_contents($fichier, "1");
    }
	}

function nombre_vues(): string
{
    $fichier = dirname('.') . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur.txt';
    incrementer_compteur($fichier);
    return file_get_contents($fichier);
}

$total = nombre_vues();

var_dump($total);
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>



<body>
  <?php 
     $recupUsers = $dbh->query('select * from users'); 
      while ($user = $recupUsers->fetch()){
          ?>
                <p><?= $user['email']; ?></p>
 <?php 
      }
 ?>



	<?php echo '<h3>Nombre de visiteurs : '. $total . '</h3>';?> 

  
       <?php echo "<h3>Nombre de visiteur en ligne: $USER_nomber </h3>";?>
</body>
</html>
