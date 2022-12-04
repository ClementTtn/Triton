<?php
session_start();

use App\Controller\ControllerProgrammation;
use App\Entity\Programmation as Programmation;

function chargerClasse($classe)
{
    $classe=str_replace('\\','/',$classe);
    require $classe . '.php';
}

spl_autoload_register('chargerClasse'); //Autoload

$Billetterie = new ControllerProgrammation();

require 'header.php';
?>

<?php if(isset($_SESSION['id_client'])) : ?>

    <?php
    if(isset($_GET['id'])){
        $Billetterie->findOneBilletterie();
    }

    else{
        $Billetterie->findListeBilletterie();
    }
    ?>

<?php require 'footer.php'; ?>

<?php else : ?>
    <?php header('location: login.php'); ?>
<?php endif ; ?>
