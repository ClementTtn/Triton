<div class="description_artiste">
    <h2 class="h2_sous_nav"><?=$artiste['nom_artiste']?></h2>
    <a href="programmation.php?id=<?=$artiste['id']?>">
        <img src=<?=$artiste['img_artiste']?> alt="prog_01" width="900" height="350">
    </a>
    <br>
    <a class="date_prog"><?=date("d/m/Y", strtotime($artiste['date_programmation']));?></a>
    <a class="tarif_billetterie"><?=$artiste['tarif']?>€</a>
    <a class="tarif_billetterie_precision">
        Le tarif énoncé ci-dessus est un tarif unique. Tarif TTC. <br>
        Places uniquement en position debout, espace réservé aux personnes à mobilité réduite disponible.
    </a>

    <form class="formulaire_billetterie" method="post" action="billetterie.php?id=<?=$artiste['id']?>">
     <label>Nombre de place(s) : </label>
     <select name="quantite" size="1">
         <option>1</option>
         <option>2</option>
         <option>3</option>
         <option>4</option>
     </select>
     <input type='number' name='id' value='<?=$artiste['id']?>' hidden required>
     <p class="bouton">
         <input type="submit" value="Ajouter au panier" name="send"/>
     </p>
    </form>
</div>