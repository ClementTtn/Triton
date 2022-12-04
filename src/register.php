<?php

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

foreach( $_POST as $cle => $valeur){
    $value[$cle] = htmlspecialchars($valeur);
}

require 'header.php';
?>
<main>

    <?php $Client->register(); ?>

</main>

<?php require 'footer.php'; ?>