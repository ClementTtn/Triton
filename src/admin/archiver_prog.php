<?php
session_start();

use App\Controller\ControllerProgrammation;
use App\Entity\Programmation as Programmation;

function chargerClasse($classe)
{
    $classe='../' . str_replace('\\','/',$classe);
    require $classe . '.php';
}

spl_autoload_register('chargerClasse'); //Autoload

$Programmation = new ControllerProgrammation();


require 'header_admin.php';
?>

<?php if(isset($_SESSION['id_admin'])) : ?>

    <?php $Programmation->archiverProgrammation(); ?>

<?php else : ?>
    <?php header('location: login_admin.php'); ?>
<?php endif ; ?>