<?php
session_start();

use App\Controller\ControllerClient;
use App\Entity\Client as Client;

use App\Controller\ControllerCommande;
use App\Entity\Commande as Commande;

// Chargement des classe autoload
function chargerClasse($classe)
{
    $classe = str_replace('\\','/', $classe);
    require $classe . '.php';
}

spl_autoload_register('chargerClasse');

$Client = new ControllerClient();
$Commande = new ControllerCommande();

require 'header.php';
?>

<?php if(isset($_SESSION['id_client'])) : ?>

<main>

    <h2 class="h2_sous_nav_monCompte">Bienvenue <br> <?=$_SESSION['prenom_client']?> <?=$_SESSION['nom_client']?></h2>

    <?php $Client->findInfoCompte(); ?>
    <?php $Client->findOneCommande(); ?>

</main>

<?php require 'footer.php'; ?>

<?php else : ?>
    <?php header('location: login.php'); ?>
<?php endif ; ?>





