<?php
session_start();

use App\Controller\ControllerClient;
use App\Entity\Client as Client;

// Chargement des classe autoload
function chargerClasse($classe)
{
    $classe = str_replace('\\','/', $classe);
    require $classe . '.php';
}

spl_autoload_register('chargerClasse');

$Client = new ControllerClient();

require 'header.php';
?>

<?php if(isset($_SESSION['id_client'])) : ?>

<main>

    <?php $Client->modif_mail_client(); ?>
    <?php $Client->modif_mdp_client(); ?>
    <?php $Client->modif_date_naissance_client(); ?>
    <?php $Client->modif_adresse_client(); ?>
    <?php $Client->modif_tel_client(); ?>

</main>

<?php require 'footer.php'; ?>

<?php else : ?>
    <?php header('location: login.php'); ?>
<?php endif ; ?>










