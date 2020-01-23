<?php
session_start();
require_once('../include/define.php');
$tableauJson = file_get_contents('../data/categories.json');
$cat = json_decode($tableauJson, true);

if (isset($_GET['action']) && $_GET['action'] == 'delete') {//$GET c'est lien. Si dans le lien action=delete alors:
    foreach ($cat as $key => $val) {
        if ($_GET['id'] == $val['id']) {//Si l'ID ajouté au lien (plus bas) et le meme alors:
            unset($cat[$key]);//On enleve la clé d'un élément du tableau
        }
    }
    $tabCatJson = json_encode($cat);
    file_put_contents('../data/categories.json', $tabCatJson);
    header('Location: categories.php');
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
<body>
<?php
require_once("../element/navigation.php");
?>

<div class="row">

    <div class="col-2 bg-dark">
        <ul class="list-unstyled text-center">
            <li><a class="text-white" href="categories.php" title="aller à la section 1">Liste cat.</a></li>
        </ul>
    </div>
    <div class="col-10 container">


        <table class="table table-striped custab offset-3 col-6">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th class="text-center">Action</th>
            <tr>
            </thead>
            <?php
            foreach ($cat as $key => $val) {
                echo '<td>
                <td>' . $val['id'] . '</td>
                <td>' . $val['nom'] . '</td>
                <td class="text-center"><a class=\'btn btn-info btn-xs\' href="categorie_detail.php?categorie_id=' . $val['id'] . '">
                <span class="glyphicon glyphicon-edit" ></span>Voir</a>
                <a href="categories.php?action=delete&id=' . $val['id'] . '" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span>Supprimer</a>
                </td>
                
            </tr>';
            }
            ?>

        </table>
        <div>
            <a class='btn btn-info btn-xs d-flex justify-content-center offset-3 col-6' href="add_categories.php"><span
                    class="glyphicon glyphicon-edit"></span>Ajouter une catégorie</a>
        </div>
    </div>

</div>

<?php
require_once("../element/footer.php");
?>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>