<h2 class="h2_sous_nav">Supprimer un administrateur</h2>

<div class="formulaire">
    <form action="supprimer_admin.php" method="post">
        <fieldset>
            <p>
                <label for="mail">Identifiant</label> <br>
                <input <?php if(!empty($value['mail'])) :?>value='<?=$value['mail']?>' <?php endif ; ?>   type="email" id="mail" name="mail" placeholder="adresse.email@exemple.com" required>
            </p>
        </fieldset>

        <p class="bouton">
            <input type="submit" value="Supprimer" name="send"/>
        </p>

        <?php if( isset($informations_incorrectes)) :?>

            <p class="informations_incorrectes"><?=$informations_incorrectes?></p>

        <?php endif ; ?>

    </form>

    <a href="index.php">Acceuil administration</a>
</div>