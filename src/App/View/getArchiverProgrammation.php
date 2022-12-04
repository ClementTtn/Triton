<h2 class="h2_sous_nav">Archiver une programmation</h2>

<div class="formulaire">
    <form action="archiver_prog.php" method="post">
        <fieldset>
            <p>
                <label for="nom_artiste">Nom de l'artiste</label> <br>
                <input <?php if(!empty($value['nom_artiste'])) :?>value='<?=$value['nom_artiste']?>' <?php endif ; ?>   type="text" id="nom_artiste" name="nom_artiste" placeholder="Polo & Pan" required>
            </p>
        </fieldset>

        <p class="bouton">
            <input type="submit" value="Archiver" name="send"/>
        </p>

        <?php if( isset($informations_incorrectes)) :?>

            <p class="informations_incorrectes"><?=$informations_incorrectes?></p>

        <?php endif ; ?>
    </form>

    <a href="index.php">Acceuil administration</a>
</div>