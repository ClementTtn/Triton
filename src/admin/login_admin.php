<?php
session_start();

use App\Controller\ControllerAdmin;
use App\Entity\Admin as Admin;

function chargerClasse($classe)
{
    $classe = '../' . str_replace('\\','/', $classe);
    require $classe . '.php';
}

spl_autoload_register('chargerClasse');

$Admin = new ControllerAdmin();

foreach( $_POST as $cle => $valeur){
    $value[$cle] = htmlspecialchars($valeur);
}

require 'header_admin.php';
?>

<?php $Admin->login_admin(); ?>