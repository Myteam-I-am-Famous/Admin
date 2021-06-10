<?php

$dbname = "myteam_rebuild";
$host = 'localhost';
$dsn = "mysql:dbname=" . $dbname . ";host=" . $host;

$user = "myteam";
$password = "myteam";

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    die();
}
$dbh;
$temps_session =15;
$temps_actuel =date("U");
$ip=$_SERVER['REMOTE_ADDR'];
$req_ip_exist =$dbh->prepare("SELECT * FROM online WHERE ip = ? ");
$req_ip_exist->execute(array($ip));
$ip_exist = $req_ip_exist->rowCount();
if($ip_exist==0){
    $add_ip = $dbh->prepare("INSERT INTO online(ip , time) values(?, ?)");
    $add_ip ->execute(array($ip,$temps_actuel));

}else{
    $update_ip = $dbh->prepare("UPDATE online SET time = ? WHERE ip = ?");
    $update_ip -> execute(array($temps_actuel,$ip));

}

$session_delete = $temps_actuel - $temps_session;

$delete_ip = $dbh->prepare("DELETE FROM online  WHERE time < ?");
$delete_ip ->execute(array($session_delete));

$show_USER = $dbh->query("SELECT * FROM online");
$USER_nomber= $show_USER->rowCount();

?>


