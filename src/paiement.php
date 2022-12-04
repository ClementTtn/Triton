<?php
session_start();

use App\Controller\ControllerProgrammation;
use App\Entity\Programmation as Programmation;

function chargerClasse($classe)
{
    $classe = str_replace('\\','/', $classe);
    require $classe . '.php';
}

spl_autoload_register('chargerClasse');

$Panier = new ControllerProgrammation();

require_once('Stripe/init.php'); // Ne pas oublier cte ligne +modifier lien vers la bonne librairie

\Stripe\Stripe::setApiKey("sk_test_51JsEvyLnTNg2x1VU2UXJ4FlkRIOw9jUPhzfuVmncSuwa2qIQDvpF9gwJxylCem1bAfaodJNqtiJW5iH9E5S375vd00KaJGGPsA");

$token = $_POST['stripeToken'];
$email = $_SESSION['mail_client'];

$customer = \Stripe\Customer::create(array(
    'email' => $email,
    'source' => $token
));

$charge = \Stripe\Charge::create(array(
    'customer' => $customer->id,
    'amount' => ($_SESSION['prix_total'])*100,
    'currency' => 'eur',
    'description' => '',
    'receipt_email' => $email
));

unset($_SESSION['panier']);

require 'header.php';
?>

<?php if(isset($_SESSION['id_client'])) : ?>

    <?php $Panier->ajouterCommande(); ?>
    <?php $Panier->ajouterDetailCommande(); ?>

    <h2 class="h2_sous_nav">Votre paiement a bien été accepté.</h2>
    <h3 class="h3_index">Vous pouvez retrouver votre commande dans votre espace client.</h3>

    <div class="bouton_espace_client">
        <a href="index.php">Accueil</a>
    </div>

    <script src="js/main.js"></script>

<?php else : ?>
<?php header('location: index.php'); ?>
<?php endif ; ?>
