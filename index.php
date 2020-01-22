<?php
session_start();
require_once('include/define.php');


if(!isset($_SESSION['name'])){
    header('Location: connexion.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">
</head>
<body>
<?php
require_once('element/secure.php');

require_once("element/navigation.php");

if (isset($_GET['link']) && $_GET['link'] == 'formulaire') {
    require_once('element/form.php');
} else {
    require_once('element/container.php');
}

require_once("element/footer.php");
?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>