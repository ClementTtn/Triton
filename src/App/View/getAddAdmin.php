<?php if(isset($_SESSION['id_admin'])) : ?>

<main>
    <h2 class="h2_sous_nav">Ajouter un administrateur</h2>
    <div class="formulaire">
        <form id="formulaire" enctype="multipart/form-data" method="post" action="ajout_admin.php">
            <p>
                <label for="mail">Adresse mail :</label>
                <input type="email" id="mail" name="mail" required/>
            </p>

            <p>
                <label for="mdp">Mot de passe :</label>
                <input type="password" id="mdp" name="mdp" required/>
            </p>

            <p>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required/>
            </p>

            <p>
                <label for="nom">Nom :</label><br>
                <input type="text" id="nom" name="nom" required/>
            </p>

            <p class="bouton">
                <input type="submit" value="Ajouter" name="send"/>
            </p>
        </form>

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
