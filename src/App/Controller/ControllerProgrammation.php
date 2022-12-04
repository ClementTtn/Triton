<?php

// Traitement en rapport avec la table "Programmation".

namespace App\Controller;

use App\Model\ProgrammationModel;

class ControllerProgrammation
{
    private $model;

    public function __construct()
    {
        $this->model = new ProgrammationModel();
    }

    // Affiche une programmation.
    public function findOne(){
        $id = htmlspecialchars($_GET['id']);
        $artiste=$this->model->findOne($id);

        require('App/View/getUneProgrammation.php');
    }

    // Affiche toutes les programmations.
    public function findListe(){
        $listeProgrammation=$this->model->findAll();

        require('App/View/getListeProgrammation.php');
    }

    // Affiche la prochaine programmation.
    public function findProchain(){
        $prochaineProgrammation=$this->model->findProchain();

        require ('App/View/getProchaineProgrammation.php');
    }

    // Affiche 3 programmations de façon aléatoire.
    public function findAlea(){
        $programmationAlea=$this->model->findAlea();

        require ('App/View/getAleaProgrammation.php');
    }

    // Ajoute une nouvelle programmation (depuis l'espace "Admin").
    public function ajouterProgrammation(){
        // Informations du transfert d'image
        $enregistrement=false;
        $info_transfert="";

        if(isset($_POST['send'])){
            if (!(empty($_POST['nom_artiste']) && empty($_POST['date_programmation']) && empty($_POST['description']) && empty($_POST['tarif']) && empty($_FILES)) && $_FILES['img_artiste']['error'] == 0) {

                //Données de l'ajout.
                $nom_artiste = htmlspecialchars($_POST['nom_artiste']);
                $date_programmation = htmlspecialchars($_POST['date_programmation']);
                $description = htmlspecialchars($_POST['description']);
                $tarif = htmlspecialchars($_POST['tarif']);

                // Informations de transfert de l'image associée à la programmation.
                $enregistrement = move_uploaded_file($_FILES["img_artiste"]["tmp_name"], "../img/programmation.php/" . $_FILES["img_artiste"]["name"]);
                $info_transfert .= "Le fichier a bien été transféré sous le nom: " . $_FILES["img_artiste"]["name"];
                $img_artiste = "img/programmation.php/" . $_FILES["img_artiste"]["name"];

                // Insertion de la programmation.
                $data = "programmation (nom_artiste, date_programmation, description, img_artiste, tarif) 
                                        VALUES ('$nom_artiste', '$date_programmation', '$description', '$img_artiste', '$tarif')";
                $ajouterProgrammation=$this->model->insert($data);

                $message_systeme = "Nouvelle programmation ajoutée au site.";
            }
        }
        require ('../App/View/getAddProgrammation.php');
    }

    // Archive une programmation quand elle est passée.
    public function archiverProgrammation(){
        if(isset($_POST['send'])){
            if (!(empty($_POST['nom_artiste']))) {
                $nom_artiste = htmlspecialchars($_POST['nom_artiste']);

                // Copie des données dans la table "archive-programmation'.
                $data1 = "archive_programmation (id, nom_artiste, date_programmation, description, img_artiste, tarif)";
                $data2 = "id, nom_artiste, date_programmation, description, img_artiste, tarif FROM programmation";
                $ajouterProgrammation=$this->model->transfert($data1, $data2, $nom_artiste);

                //Suppression des données dans la table "programmation".
                $supprimerProgrammation=$this->model->deleteProg($nom_artiste);

                header('Location: index.php');
            }
        }
        require('../App/View/getArchiverProgrammation.php');
    }

    // Affiche l'ensemble de la billetterie.
    public function findListeBilletterie(){
        $listeBilletterie=$this->model->findAll();

        require('App/View/getListeBilletterie.php');
    }

    // Affiche une billetterie (une / programmation).
    public function findOneBilletterie(){  //Ajoute aussi au panier
        $id = htmlspecialchars($_GET['id']);
        $artiste=$this->model->findOne($id);

        if(isset($_POST["send"])){

            if(!empty($_POST['id']) && !empty($_POST['quantite']) &&  $_POST['quantite'] > 0 && $_POST['quantite'] < 5){

                $id = htmlspecialchars($_POST['id']);
                $quantite = htmlspecialchars($_POST['quantite']);

                // Si aucun tableau n'existe :
                if( !isset($_SESSION['panier'])){
                    // Initialisation d'un tableau dans la session panier.
                    $_SESSION['panier'] = array();
                }

                // Ajout des informations de l'achat dans le panier.
                $_SESSION['panier'][$id] = $quantite;

                header('location: panier.php');
            }
        }

        require('App/View/getUneBilletterie.php');
    }

    // Affichage du panier
    public function afficherPanier(){
        if(!empty($_SESSION['panier'])) {
            // Initialisation des données.
            $artistes = null;
            $compteur = 0;
            $_SESSION['prix_total'] = 0;

            foreach ($_SESSION['panier'] as $id => $quantite) {
                // Mise en place d'un compteur pour déterminer le nombre de place(s) d'une programmation.
                $artistes[$compteur] = $this->model->findOne($id);

                //Calcul du prix total.
                $_SESSION['prix_total'] += $artistes[$compteur++]['tarif'] * $quantite;
            }
        }
        require ('App/View/getPanier.php');
    }

    // Modification du nombre de place(s).
    public function modifierQuantiteInitPrix(){
        if(isset($_POST['id']) && isset($_POST['quantite'])){

            $id = htmlspecialchars($_POST['id']);
            $quantite = htmlspecialchars($_POST['quantite']);


            // Si la quantité est égale à 0, suppression de l'article en question.
            if($quantite == 0){
                unset($_SESSION['panier'][$id]);
            }
            // Vérification de la quantité
            elseif($quantite > 0 && $quantite < 5){
                // Modification de la quantité.
                $_SESSION['panier'][$id] = $quantite;
            }
        }
    }

    // Ajout de la commande dans la base de données.
    function ajouterCommande(){
        $id = htmlspecialchars($_POST['id_client']);
        $date_commande = htmlspecialchars($_POST['date_commande']);
        $prix_commande = htmlspecialchars($_POST['prix_total']);

        $data = "commande (id, date_commande, prix_commande) 
                                VALUES ('$id', '$date_commande', '$prix_commande')";
        $ajouterCommande=$this->model->insert($data);
    }

    // Ajout des détails de la commande dans la base de données.
    function ajouterDetailCommande(){
        $id = htmlspecialchars($_POST['id']);
        $quantite = htmlspecialchars($_POST['quantite']);

        $data = "detail_commande (id_commande, id, qte_place)
                                VALUES (LAST_INSERT_ID(), '$id', '$quantite')";
        $ajouterDetailCommande=$this->model->insert($data);
    }
}