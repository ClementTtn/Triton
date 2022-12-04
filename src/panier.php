<?php
session_start();

use App\Controller\ControllerProgrammation;
use App\Entity\Programmation as Programmation;

// Chargement des classe autoload
function chargerClasse($classe)
{
    $classe = str_replace('\\','/', $classe);
    require $classe . '.php';
}

spl_autoload_register('chargerClasse');

$Panier = new ControllerProgrammation();

require 'header.php';
?>

<?php if(isset($_SESSION['id_client'])) : ?>

    <?php $Panier->modifierQuantiteInitPrix(); ?>
    <?php $Panier->afficherPanier(); ?>

<?php else : ?>
    <?php header('location: login.php'); ?>
<?php endif ; ?>


<?php require 'footer.php';?>