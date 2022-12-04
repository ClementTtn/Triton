<h2 class="h2_sous_nav">Modifier vos informations</h2>
<a class ="modif_infos" href="mon_compte.php">Retour à votre compte</a>
    <div class="formulaire_modif_infos">

        <form action="modif_infos.php" method="post">
            <fieldset>
                <p>
                    <label for="mail">Adresse mail</label> <br>
                    <input type="email" id="mail" name="mail" placeholder="adresse.email@exemple.com" required>
                </p>

                <?php if(isset($mailVerif)):?>
                    <a class="mailExiste">Cette adresse e-mail est déjà utilisée.</a>
                <?php endif;?>
            </fieldset>

            <p class="bouton">
                <input type="submit" value="Modifier" name="send"/>
            </p>
        </form>

        <form action="modif_infos.php" method="post">
            <fieldset>
                <p>
                    <label for="mdp">Mot de passe</label>
                    <input value="" type="password" id="mdp" name="mdp" placeholder="Mot de passe" required>
                    <img src="img/register.php%20/eye.svg" alt="eye" class="cache">
                    <img src="img/register.php%20/eye-off.svg" alt="eye-off" class="visible" style="display: none">
                </p>
            </fieldset>

            <p class="bouton">
                <input type="submit" value="Modifier" name="send"/>
            </p>
        </form>


        <form action="modif_infos.php" method="post">
            <fieldset>
                <p>
                    <label for="date_naissance">Date de naissance</label> <br>
                    <input type="date" id="date_naissance" name="date_naissance" required>
                </p>
            </fieldset>

            <p class="bouton">
                <input type="submit" value="Modifier" name="send"/>
            </p>
        </form>


        <form action="modif_infos.php" method="post">
            <fieldset>
                <p>
                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" placeholder="Adresse : 1 rue de l'église" required>

                    <label for="code_postal"></label>
                    <input type="text" id="code_postal" name="code_postal" placeholder="Code postal : 75000" required>

                    <label for="code_postal"></label>
                    <input type="text" id="ville" name="ville" placeholder="Ville : Paris" required>
                </p>
            </fieldset>

            <p class="bouton">
                <input type="submit" value="Modifier" name="send"/>
            </p>
        </form>


        <form action="modif_infos.php" method="post">
            <fieldset>
                <p>
                    <label for="tel">Téléphone</label> <br>
                    <input type="text" id="tel" name="tel" placeholder="0601020304" required>
                </p>
            </fieldset>

            <p class="bouton">
                <input type="submit" value="Modifier" name="send"/>
            </p>
        </form>
    </div>

<a class ="modif_infos" href="suppression_compte.php">Supprimer votre compte</a>
<a class="suppression_compte">Attention, cette action sera définitive. Votre compte sera supprimé de notre base de données.</a>