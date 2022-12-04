<?php

    use App\Controller\ControllerProgrammation;
    use App\Entity\Programmation as Programmation;

    function chargerClasse($classe)
    {
        $classe=str_replace('\\','/',$classe);
        require $classe . '.php';
    }

    spl_autoload_register('chargerClasse'); //Autoload

    $Programmation = new ControllerProgrammation();

    require 'header.php';
?>

<main>

    <?php
        if(isset($_GET['id'])){
            $Programmation->findOne();

            $Programmation->findAlea();
        }

        else{
            $Programmation->findListe();
        }
    ?>

</main>

<?php require 'footer.php' ?>


