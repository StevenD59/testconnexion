<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php
                if ($_SESSION['right_value']>=ADMIN){
                    echo '<li><a class="nav-link" href="admin/index.php">Admin</a></li>';
                }
                ?>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?link=formulaire">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="deconnexion.php">Deconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
