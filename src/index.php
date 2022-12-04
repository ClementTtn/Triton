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

$Programmation = new ControllerProgrammation();


require 'header.php';
?>

    <main>
        <?php $Programmation->findProchain(); ?>

        <div class="fond_fonce">
        <h3>Quelques chiffres</h3>
            <ul class="quelques_chiffres">
                <li><a>Un rendez-vous incontournable depuis 2018</a></li>
                <li><a>2 salles de concert</a></li>
                <li><a>Plus de 120 artistes</a></li>
                <li><a>11 expositions temporaires</a></li>
                <li><a>150 000 spectateurs venus nous voir</a></li>
                <li><a>15 000 personnes sur nos réseaux</a></li>
            </ul>
        </div>


        <h3 class="h3_index">Retrouvez-nous ici</h3>
        <div class="reseaux">
            <a href="https://www.instagram.com/tritonmusicc/?hl=fr" target="_blank">
                <img src="img/reseaux/instagram.svg" alt="instagram" height="150" width="150">
            </a>

            <a href="https://twitter.com/tritonmusicc" target="_blank">
                <img src="img/reseaux/twitter.svg" alt="twitter" height="150" width="150">
            </a>

            <a href="https://www.youtube.com/user/tritonmusic" target="_blank">
                <img src="img/reseaux/youtube.svg" alt="youtube" height="150" width="150">
            </a>
        </div>
    </main>

<?php require 'footer.php'; ?>