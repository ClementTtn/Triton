<div class="mon_compte">
    <div class="infos_compte">
        <h3 class="h3_mon_compte">Mes informations personnelles</h3>
        <br>
        <ul class="infos_client">
            <li class="li_mon_compte">Adresse mail</li>
            <li><?=$_SESSION['mail_client']?></li>

            <br>

            <li class="li_mon_compte">Date de naissance</li>
            <li><?=date("d/m/Y", strtotime($_SESSION['date_naissance_client']))?></li>

            <br>

            <li class="li_mon_compte">Adresse</li>
            <li><?=$_SESSION['adresse_client']?></li>
            <li><?=$_SESSION['code_postal_client']?>, <?=$_SESSION['ville_client']?></li>

            <br>

            <li class="li_mon_compte">Téléphone</li>
            <li class="li_mon_compte_last"><?=$_SESSION['tel_client']?></li>
        </ul>

        <a class ="modif_infos" href="modif_infos.php">Modifier vos informations</a>
    </div>