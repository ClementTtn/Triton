<h2 class="h2_sous_nav">Créer votre compte</h2>

<div class="formulaire">
    <form method="post">
        <fieldset>
            <p>
                <label for="genre">Genre</label> <br>
                <select name="genre" size="1"  required>
                    <option>
                    <option>Monsieur
                    <option>Madame
                    <option>Non précisé
                </select>
            </p>

            <p>
                <label for="prenom">Prénom</label> <br>
                <input <?php if(!empty($value['prenom'])) :?>value='<?=$value['prenom']?>' <?php endif ; ?>   type="text" id="prenom" name="prenom" placeholder="Prénom" required>
            </p>

            <p>
                <label for="nom">Nom</label> <br>
                <input <?php if(!empty($value['nom'])) :?>value='<?=$value['nom']?>' <?php endif ; ?>   type="text" id="nom" name="nom"  placeholder="Nom" required>
            </p>

            <p>
                <label for="date_naissance">Date de naissance</label> <br>
                <input <?php if(!empty($value['date_naissance'])) :?>value='<?=$value['date_naissance']?>' <?php endif ; ?>   type="date" id="date_naissance" name="date_naissance" required>
            </p>

            <p>
                <label for="adresse">Adresse</label> <br>
                <input <?php if(!empty($value['adresse'])) :?>value='<?=$value['adresse']?>' <?php endif ; ?> type="text" id="adresse" name="adresse"  placeholder="000 rue de XXX" required>
            </p>

            <p>
                <label for="code_postal">Code postal</label> <br>
                <input <?php if(!empty($value['code_postal'])) :?>value='<?=$value['code_postal']?>' <?php endif ; ?> type="text" id="code_postal" name="code_postal" placeholder="12345" required>
            </p>

            <p>
                <label for="ville">Ville</label> <br>
                <input <?php if(!empty($value['ville'])) :?>value='<?=$value['ville']?>' <?php endif ; ?> type="text" id="ville" name="ville" required>
            </p>

            <p>
                <label for="tel">Numéro de téléphone</label> <br>
                <input <?php if(!empty($value['tel'])) :?>value='<?=$value['tel']?>' <?php endif ; ?> type="text" id="tel" name="tel" placeholder="0601020304" required>
            </p>

            <p>
                <label for="mail">Adresse e-mail</label> <br>
                <input value="" type="email" id="mail" name="mail" placeholder="adresse.email@exemple.com" required>
            </p>


            <?php if(isset($mailVerif)):?>
                <a class="mailExiste">Cette adresse e-mail est déjà utilisée.</a>
            <?php endif;?>


            <p>
                <label for="mdp">Mot de passe</label>
                <input value="" type="password" id="mdp" name="mdp" placeholder="Mot de passe" required>

                <img src="img/register.php%20/eye.svg" alt="eye" class="cache">
                <img src="img/register.php%20/eye-off.svg" alt="eye-off" class="visible" style="display: none">
            </p>
        </fieldset>

        <p class="bouton">
            <input type="submit" value="Envoyer" name="send"/>
        </p>
    </form>

    <a>Vous avez déjà un compte ? </a>
    <a href="login.php">Connectez-vous !</a>
</div>