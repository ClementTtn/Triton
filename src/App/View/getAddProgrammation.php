<?php if(isset($_SESSION['id_admin'])) : ?>

<main>
    <h2 class="h2_sous_nav">Ajout d'une programmation</h2>
    <div class="formulaire">
        <form id="formulaire" enctype="multipart/form-data" method="post" action="ajout_prog.php">
            <p>
                <label for="nom_artiste">Nom de l'artiste :</label>
                <input type="text" id="nom_artiste" name="nom_artiste" required/>
            </p>

            <p>
                <label for="date_programmation">Date de la programmation :</label>
                <input type="date" id="date_programmation" name="date_programmation" required/>
            </p>

            <p>
                <label for="description">Description de l'artiste :</label>
                <input type="text" id="description" name="description" required/>
            </p>

            <p>
                <label for="img_artiste">Image de l'artiste :</label>
                <input type="file" id="img_artiste" name="img_artiste" accept="image/jpeg" required/>
            </p>

            <p>
                <label for="tarif">Tarif du concert :</label>
                <input type="text" id="tarif" name="tarif" required/>
            </p>

            <p class="bouton">
                <input type="submit" value="Ajouter" name="send"/>
            </p>
        </form>

        <?php if($enregistrement) : ?>
            <a><?=$info_transfert;?></a>
        <?php endif; ?>

        <?php if(isset($message_systeme)) : ?>
            <a><?=$message_systeme?></a>
        <?php endif ; ?>
    </div>
</main>

<div class="a_admin">
    <h3><a href="index.php">Acceuil administration</a></h3>
</div>

</body>

<?php else : ?>
    <?php header('location: login.php'); ?>
<?php endif ; ?>