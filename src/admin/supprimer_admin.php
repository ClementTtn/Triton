<?php
session_start();

use App\Controller\ControllerAdmin;
use App\Entity\Admin as Admin;

function chargerClasse($classe)
{
    $classe='../' . str_replace('\\','/',$classe);
    require $classe . '.php';
}

spl_autoload_register('chargerClasse'); //Autoload

$Admin = new ControllerAdmin();


require 'header_admin.php';
?>
<?php if(isset($_SESSION['id_admin'])) : ?>

    <?php $Admin->supprimerAdmin(); ?>

<?php else : ?>
    <?php header('location: login_admin.php'); ?>
<?php endif ; ?>