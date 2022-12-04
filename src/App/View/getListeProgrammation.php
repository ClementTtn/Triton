<h2 class="h2_sous_nav">Programmation 2022</h2>

<?php foreach($listeProgrammation as $uneProgrammation) : ?>

    <div class="collec_img_concert">
        <a href="programmation.php?id=<?=$uneProgrammation['id']?>">
            <img src=<?=$uneProgrammation['img_artiste']?> alt="prog_01" width="900" height="350">
        </a>
        <a class="artiste_prog"><?=$uneProgrammation['nom_artiste']?></a>
        <br>
        <a class="date_prog"><?=date("d/m/Y", strtotime($uneProgrammation['date_programmation']));?></a>
        <div class="redirection_vue_artiste">
            <a href="programmation.php?id=<?=$uneProgrammation['id']?>">En savoir plus</a>
        </div>
    </div>

<?php endforeach;?>

<h3 class="h3_prog">Suite prochainement...</h3>