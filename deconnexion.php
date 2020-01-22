<?php
session_start();//Toujours le mettre.
$_SESSION=[];
session_destroy();// Finalement, on détruit la session.
header('Location: connexion.php');
exit();
?>