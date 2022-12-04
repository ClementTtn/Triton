<div class="proposition">
    <h2 class="h2_vue_artiste">Vous aimerez peut-être</h2>

    <?php foreach ($programmationAlea as $uneProposition) : ?>
        <a href="programmation.php?id=<?=$uneProposition['id']?>">
            <img src=<?=$uneProposition['img_artiste']?> alt="proposition_01" width="600" height="233">
        </a>
        <a><?=$uneProposition['nom_artiste']?></a>
        <a class="date_prog"><?=date("d/m/Y", strtotime($uneProposition['date_programmation']));?></a>
    <?php endforeach; ?>

</div>
