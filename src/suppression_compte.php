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

    <?php $Client->suppression_compte(); ?>

</main>

<?php require 'footer.php'; ?>

<?php else : ?>
    <?php header('location: login.php'); ?>
<?php endif ; ?>
