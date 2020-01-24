<?php
session_start();
require_once('../include/define.php');
require_once ('../element/secure.php');

$tableauJson = file_get_contents('../data/categories.json');
$cat = json_decode($tableauJson, true);
foreach ($cat as $key => $val) {
    if (isset($GetSecure['categorie_id']) && $GetSecure['categorie_id'] == $val['id']) {
        $nom = $val['nom'];
        $id = $val['id'];
    }
}



if (isset($PostSecure['send'])) { //Si on est dans le bouton qui a pour name "send"
    foreach ($cat as &$val) { //& cible l'élément a modifier directement dans le tableau
        if (isset($PostSecure['id']) && ($PostSecure['id'] == $val['id']))
                $val['nom'] = $_POST['nom']; //$_POST = valeur que j'ai rentré dans le formulaire
        }

    if(file_put_contents('../data/categories.json', json_encode($cat)))
    {
        header('Location: categories.php');
    }else{
        $error = 'un souci';
    }


    }


?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/blog-home.css" rel="stylesheet">
</head>
</head>
<body>
<?php
require_once("../element/navigation.php");
?>

<div class="row">

    <div class="col-2 bg-dark">
        <ul class="list-unstyled text-center">
            <li id="navigation">
            <li><a class="text-white" href="categories.php" title="aller à la section 1">Liste cat.</a></li>
            </li>
        </ul>
    </div>
    <div class="col-10 container">
        <form method="POST">
            <div class="form-group">
            <label for="exampleInputEmail1">Modifier titre de la catégorie</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nom" value="<?= $nom ?>" aria-describedby="emailHelp" placeholder="">
            <input type="hidden" class="form-control" id="exampleInputEmail1" name="id"  value="<?= $id ?>" aria-describedby="emailHelp" placeholder="">
        </div>

        <button type="submit" name="send" class="btn btn-primary">Modifier</button>

        </form>
        <?php

        ?>
    </div>

</div>


<?php
require_once("../element/footer.php");
?>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>