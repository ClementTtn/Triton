<h2 class="h2_sous_nav">Mon panier</h2>

<?php if(!empty($artistes)) : ?>

    <table class="tableau_panier">

        <th>Artiste</th>
        <th>Unité</th>
        <th>Quantité</th>
        <th>Total</th>


        <?php foreach($artistes as $artiste) : ?>

            <tr>
                <td><a href="billetterie.php?id=<?=$artiste['id']?>"><?=$artiste['nom_artiste']?></a></td>
                <td><?=$artiste['tarif']?>€</td>
                <td>
                    <form class="formulaire_panier" method="post" action='panier.php'>
                        <label></label>
                        <select name="quantite" size="1">

                            <!-- Boucle qui permet de définir la quantité de l'article choisi. -->

                            <?php for( $i = 0; $i< 5; $i++) : ?>

                                <?php if($i == $_SESSION['panier'][$artiste['id']] ) : ?>

                                    <option selected='selected'><?=$i?></option>

                                <?php else : ?>

                                    <option><?=$i?></option>

                                <?php endif ;?>

                            <?php endfor ;?>

                        </select>
                        <input type='number' name='id' value='<?=$artiste['id']?>' hidden required>

                        <button class="bouton_quantite" type="submit" name="send">
                            <img src="img/check.svg" alt="check">
                        </button>

                    </form>
                </td>
                <!-- Affichage du prix total du panier. -->
                <td><?=$artiste['tarif'] * $_SESSION['panier'][$artiste['id']] ?>€</td>
            </tr>

        <?php endforeach;?>

    </table>

    <a class="montant_panier"> Montant du panier : <?=$_SESSION['prix_total']?>€ TTC.</a>

    <!-- Implantation du système de paiement Stripe. -->
    <table id="stripe">
        <th></th>

        <td>
            <form action="paiement.php" method="POST">
                <input type='text' name='id' value='<?=$artiste['id']?>' hidden required>
                <input type='text' name='id_client' value='<?=$_SESSION['id_client']?>' hidden required>
                <input type='date' name='date_commande' value='<?=date('Y-m-d')?>' hidden required>
                <input type='text' name='quantite' value='<?=$_SESSION['panier'][$artiste['id']]?>' hidden required>
                <input type='number' name='prix_total' value='<?=$_SESSION['prix_total']?>' hidden required>

                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_51JsEvyLnTNg2x1VUXe0j9hxMhqnWKLYOEN4soaIl9UQIdTJzGsQxfZ1GDxuh4ehsyvwz1nqPOYBSd0jswy2rjZtR00ger8Fj62"
                    data-amount="(<?=$_SESSION['prix_total']?>)*100"
                    data-local ="auto"
                    data-currency="eur"
                    data-label="Procéder au paiement">
                </script>

                <p class="bouton">
                    <input type="submit" value="Procéder au paiement" name="send_paiement" hidden required/>
                </p>
            </form>
        </td>
    </table>

<?php else : ?>
    <img id="panier_vide" src="img/panier_vide.svg" alt="panier_vide">
    <h2>Votre panier est vide</h2>
<?php endif ; ?>

<a class="redirection_billetterie" href="billetterie.php">Billetterie</a>