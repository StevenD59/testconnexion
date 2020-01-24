<?php
session_start();
require_once('../include/define.php');
$tableauJson = file_get_contents('../data/categories.json');
$cat = json_decode($tableauJson, true);


/**
 * Si on envoi le formulaire et que la champs nom n'est pas vide
 */
if(isset($_POST['nom']) && $_POST['nom'] != ''){

    /**
     * On recupere la valeur de l'id la plus grande grace à array_colum( voir la doc)
     */
    $id = max(array_column($cat, 'id')) +1;

    /**
     * On creer un tableau avec comme element un tableau qui contient le dernier id +1
     * et le nom de la categorie recuperer grace à $_POST
     */
    $newElement = [[
        'id' => $id,
        'nom' => $_POST['nom'],
        ]];


    /**
     * On merge le tableau que l'on a recuperer du fichier json avec le tableau qu'on a creé
     */
    $newTab = array_merge($cat, $newElement);

    /**
     * On l'encode en json et on le PUT dans le fichier
     */
    if(file_put_contents('../data/categories.json', json_encode($newTab)))
    {

        header('Location: categories.php');
    }else{
        $error = 'un soucis';
    }
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
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/blog-home.css" rel="stylesheet">
</head>
<body>
<?php
require_once("../element/navigation.php");
?>


<form method="POST" action="add_categories.php" class="container">
    <?php
        if(isset($error))
        {
            echo '<span class="text-danger">'.$error.'</span>';
        }

    ?>

    <div class="form-group">
        <label for="exampleInputEmail1">Titre de l'article</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="nom" aria-describedby="emailHelp" placeholder="">
    </div>

    <button type="submit" name="send" class="btn btn-primary">Ajouter l'article</button>
</form>


<?php
require_once("../element/footer.php");
?>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>