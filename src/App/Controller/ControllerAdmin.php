<?php

// Traitement en rapport avec la table "Admin".

namespace App\Controller;

use App\Model\AdminModel;
use App\Model\ClientModel;

class ControllerAdmin
{
    private $model;

    public function __construct()
    {
        $this->model = new AdminModel();
    }

    // Connexion à l'espace Admin.
    public function login_admin() {
        if(isset($_POST["send"])) {
            if (!(empty($_POST['mail']) && empty($_POST['mdp']))) {
                $mail = htmlspecialchars($_POST['mail']);
                $mdp = htmlspecialchars(hash('sha256', $_POST['mdp']));


                // Vérification de l'existence des identifiants de connexion.
                // Puis connexion.
                if ($this->model->findLogin($mail, $mdp)['verifLogin'] == 1) {
                    $login_admin=$this->model->getLogin($mail, $mdp);

                    // Variables de la session.
                    $_SESSION['id_admin'] = $login_admin->id;
                    $_SESSION['prenom_admin'] = $login_admin->prenom;
                    $_SESSION['nom_admin'] = $login_admin->nom;

                    // Redirection de l'utilisateur vers index.php quand la connexion est effectuée.
                    header('location: index.php');
                } else {
                    $informations_incorrectes = "Identifiant ou mot de passe incorrect.";
                }
            }
        }
        else {}
        require ('../App/View/getLoginAdmin.php');
    }

    //Ajouter un nouvel administrateur.
    public function ajouterAdmin(){
        if(isset($_POST['send'])){
            if (!(empty($_POST['mail']) && empty($_POST['mdp']) && empty($_POST['prenom']) && empty($_POST['nom']))) {
                //Données de l'ajout.
                $mail = htmlspecialchars($_POST['mail']);
                $mdp = htmlspecialchars(hash('sha256', $_POST['mdp']));
                $prenom = htmlspecialchars($_POST['prenom']);
                $nom = htmlspecialchars($_POST['nom']);

                $data = "admin (mail, mdp, prenom, nom) 
                                        VALUES ('$mail', '$mdp', '$prenom', '$nom')";
                $register=$this->model->insert($data);

                $message_systeme = "Nouvel administrateur ajouté au site.";
            }
        }
        require ('../App/View/getAddAdmin.php');
    }

    // Supprimer un administrateur.
    public function supprimerAdmin(){
        if(isset($_POST["send"])) {
            if (!(empty($_POST['mail']))) {
                $mail = htmlspecialchars($_POST['mail']);

                // Vérification de l'existence des identifiants de connexion.
                if ($this->model->findMail($mail)['verifMail'] == 1) {
                    $supprimerAdmin=$this->model->deleteAdmin($mail);

                    // Redirection de l'utilisateur vers index.php quand la suppression est effectuée.
                    header('location: index.php');
                } else {
                    $informations_incorrectes = "Mail incorrect.";
                }
            }
        }
        require ('../App/View/getSupprimerAdmin.php');
    }

}