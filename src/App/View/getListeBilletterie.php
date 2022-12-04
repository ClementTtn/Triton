<h2 class="h2_sous_nav">Billetterie</h2>

<?php foreach($listeBilletterie as $uneBilletterie) : ?>

    <div class="collec_img_concert">
        <a href="billetterie.php?id=<?=$uneBilletterie['id']?>">
            <img src=<?=$uneBilletterie['img_artiste']?> alt="prog_01" width="900" height="350">
        </a>
        <a class="artiste_prog"><?=$uneBilletterie['nom_artiste']?></a>
        <br>
        <a class="date_prog"><?=date("d/m/Y", strtotime($uneBilletterie['date_programmation']));?></a>
        <a class="date_prog"><?=$uneBilletterie['tarif']?>€</a>
        <div class="redirection_vue_artiste">
            <a href="billetterie.php?id=<?=$uneBilletterie['id']?>">En savoir plus</a>
        </div>

    </div>

<?php endforeach;?>