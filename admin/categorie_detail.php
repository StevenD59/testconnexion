<?php
session_start();
require_once('../include/define.php');

$tableauJson = file_get_contents('../data/articles.json');
$art = json_decode($tableauJson, true);

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
        <?php
        foreach ($art as $key => $val) {
            if (isset($_GET['categorie_id']) && $_GET['categorie_id'] == $val['id']) {
                echo '<h1 class="text-center">' . $val['titre'] . '</h1>';
                echo '<p class="text-center">' . $val['desc'] . '</p>';

            }
        }
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