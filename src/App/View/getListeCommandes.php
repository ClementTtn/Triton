<h2 class="h2_sous_nav_monCompte">Vos Commandes</h2>

<a class ="modif_infos" href="mon_compte.php">Retour à votre compte</a>

<table class="tableau_commande">

    <th>N°</th>
    <th>Date</th>
    <th>Prix</th>
    <th>Artiste</th>
    <th>Place(s)</th>

    <?php foreach($listeCommande as $commande) : ?>

        <tr>
            <td><?=$commande['id_commande']?></td>
            <td><?=date("d/m/Y", strtotime($commande['date_commande']));?></td>
            <td><?=$commande['prix_commande']?>€</td>
            <td><a href="programmation.php?id=<?=$commande['id']?>"><?=$commande['nom_artiste']?></a></td>
            <td><?=$commande['qte_place']?></td>
        </tr>
    <?php endforeach;?>
</table>