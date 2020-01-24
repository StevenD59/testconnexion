<?php
session_start();
require_once('include/define.php');
$tabJson = file_get_contents('data/articles.json');
$articles = json_decode($tabJson,true);
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

foreach ($articles as $key => $val) {
    if(isset($_GET['categorie_id']) && $_GET['categorie_id']==$val['categorie_id']){
        echo '<h1 class="text-center">'.$val['titre'].'</h1>';
        echo '<p class="text-center">'.$val['desc'].'</p>';
        echo '<a href="articles_detail.php?article_id='.$val['id'].'">Suite de l\'article</a>';

    }
}


require_once("element/footer.php");
?>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>