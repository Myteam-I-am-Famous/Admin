<?php
include('includes/database_handler.php');


$temps_session = 15;
$temps_actuel = date("U");

$session_delete = $temps_actuel - $temps_session;



$q = $dbh->query("UPDATE users SET status = 2 WHERE time < " . $session_delete . ";");
$updateStatus = $q->execute();

var_dump($updateStatus);

$show_USER = $dbh->query("SELECT COUNT(*) FROM users WHERE status = 3");
$USER_nomber = $show_USER->fetch();
