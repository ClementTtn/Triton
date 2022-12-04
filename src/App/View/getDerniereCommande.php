    <div class="derniere_commande">

        <?php if (!empty($derniereCommande)) : ?>
        <h3 class="h3_mon_compte">Dernière commande</h3>
        <br>
        <ul class="infos_client">
            <li class="li_mon_compte">N° de la commande</li>
            <li><?=$derniereCommande['id_commande']?></li>

            <br>

            <li class="li_mon_compte">Date de la commande</li>
            <li><?=date("d/m/Y", strtotime($derniereCommande['date_commande']));?></li>

            <br>

            <li class="li_mon_compte">Prix de la commande</li>
            <li><?=$derniereCommande['prix_commande']?>€</li>

            <br>

            <li class="li_mon_compte">Artiste</li>
            <li><?=$derniereCommande['nom_artiste']?></li>

            <br>

            <li class="li_mon_compte">Nombre de place(s)</li>
            <li><?=$derniereCommande['qte_place']?></li>
        </ul>

        <a class ="modif_infos" href="commandes.php">Toutes les commandes</a>
        <?php else : ?>
            <a class="modif_infos">
                Vous n'avez effectué aucune commande pour le moment.
                <br>
                <br>
                Celles-ci s'afficheront ici.
            </a>

            <a class="modif_infos" href="billetterie.php">Accédez à la billetterie</a>
        <?php endif; ?>
    </div>
</div>

<a class ="modif_infos" href="logout.php">Déconnexion</a>