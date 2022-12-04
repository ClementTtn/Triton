<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Triton</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
    </style>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/ecranlarge.css">
</head>



<body>
<header>
    <p><img id="ouverture_menu" src="img/menu.svg" alt="ouverture_menu"></p>
    <h1><a href="index.php">Τρίτων</a></h1>

    <?php if (isset($_SESSION['id_client'])): ?>
        <a href="mon_compte.php"><img id="img_compte" src="img/compte.svg" alt="img_compte"></a>
    <?php else :?>
        <a href="login.php"><img id="img_compte" src="img/compte.svg" alt="img_compte"></a>
    <?php endif ; ?>

    <nav id="fermé" class="menu">
        <ul>
            <li id="icone_fermeture"><img id="fermeture_menu" src="img/close.svg" alt="fermeture_menu"></li>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="programmation.php">Programmation</a></li>
            <li><a href="lieux.php">Les lieux</a></li>
            <li><a href="studios.php">Studios</a></li>
            <li><a href="activites.php">Activités</a></li>
            <li><a href="infos.php">Infos pratiques</a></li>
            <li><a href="billetterie.php">Billetterie</a></li>

            <?php if (isset($_SESSION['id_client'])) : ?>
                <li><a href="panier.php">Mon panier</a></li>
            <?php endif ; ?>
        </ul>

        <div class="footer_burger">

            <div class="affichage_menu_connecte">
                <?php if (isset($_SESSION['id_client'])) : ?>
                    <a>Bonjour <?=$_SESSION['prenom_client']?> <?=$_SESSION['nom_client']?></a>
                <?php endif ; ?>
            </div>

            <div class="affichage_menu_connecte">
                <?php if (isset($_SESSION['id_client'])) : ?>
                    <a href="logout.php">Déconnexion</a>
                <?php endif ; ?>
            </div>

            <div class="affichage_menu_connecte">
                <?php if (!isset($_SESSION['id_client'])) : ?>
                    <a class="a_admin" href="admin/login_admin.php">Admin</a>
                <?php endif; ?>
            </div>

        </div>
    </nav>
</header>