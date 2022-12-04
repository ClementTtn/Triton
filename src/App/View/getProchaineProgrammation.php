<h2 class="h2_sous_nav">Notre prochaine date</h2>

<div class="collec_img_concert">
    <a href="programmation.php?artiste=<?=$prochaineProgrammation['id']?>">
        <img src=<?=$prochaineProgrammation['img_artiste']?> alt="prog_01" width="900" height="350">
    </a>
    <a class="artiste_prog"><?=$prochaineProgrammation['nom_artiste']?></a>
    <br>
    <a class="date_prog"><?=date("d/m/Y", strtotime($prochaineProgrammation['date_programmation']));?></a>
</div>

<div class="bouton_prog">
    <a href="programmation.php">Toute la programmation</a>
</div>