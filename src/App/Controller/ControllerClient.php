<?php

// Traitement en rapport avec la table "Client".

namespace App\Controller;

use App\Model\ClientModel;

class ControllerClient
{
    private $model;

    public function __construct()
    {
        $this->model = new ClientModel();
    }

    // Inscription d'un nouveau client.
    public function register()
    {
        if (isset($_POST["send"])) {

            if (!(empty($_POST['genre']) && empty($_POST['prenom']) && empty($_POST['nom'])
                && empty($_POST['date_naissance']) && empty($_POST['adresse']) && empty($_POST['code_postal'])
                && empty($_POST['ville']) && empty($_POST['tel']) && empty($_POST['mail']) && empty($_POST['mdp']))) {

                //Données de l'ajout.
                $genre = htmlspecialchars($_POST['genre']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $nom = htmlspecialchars($_POST['nom']);
                $date_naissance = htmlspecialchars($_POST['date_naissance']);
                $adresse = htmlspecialchars($_POST['adresse']);
                $code_postal = htmlspecialchars($_POST['code_postal']);
                $ville = htmlspecialchars($_POST['ville']);
                $tel = htmlspecialchars($_POST['tel']);
                $mail = htmlspecialchars($_POST['mail']);

                //Hachage du mot de passe
                $mdp = htmlspecialchars(hash('sha256', $_POST['mdp']));

                // Vérification de l'existence du mail renseigné dans la base de données.
                // Si le mail est déjà présent dans la base, inscription impossible.
                if ($this->model->findMail($mail)['verifMail'] == 0) {
                    $data = "client (genre, prenom, nom, date_naissance, adresse, code_postal, ville, tel, mail, mdp) 
                                        VALUES ('$genre', '$prenom', '$nom', '$date_naissance', '$adresse', '$code_postal', '$ville', '$tel', '$mail', '$mdp')";
                    $register=$this->model->insert($data);

                    //Envoi du mail de confirmation d'inscription du compte à l'adresse mail renseignée.
                    $destinataire = $mail;
                    $expediteur = 'inscription@triton.ctutin.fr';
                    $sujet = "Confirmation de votre inscription";
                    $message =
                        ' Bienvenue sur Triton,
                    
                    Votre compte a bien été enregistré.
                    
                    Vous pouvez dès à présent accéder à votre espace client.
                    
                    Nous espérons vous voir très vite dans une de nos salles !

                    ---------------
                    
                    Ceci est un mail automatique, merci de ne pas y répondre.';
                    $entete = 'From: '.$expediteur. "\r\n" . 'Reply-To: '.$expediteur. "\r\n" . 'X-Mailer: PHP/' . phpversion();
                    mail($destinataire, $sujet, $message, $entete);

                    header('location: login.php');
                }
                else{
                    $mailVerif=1;
                }
            }
        }
        require ('App/View/getRegister.php');
    }

    // Connexion à l'espace Client.
    public function login() {
        if(isset($_POST["send"])) {
            if (!(empty($_POST['mail']) && empty($_POST['mdp']))) {
                $mail = htmlspecialchars($_POST['mail']);
                $mdp = htmlspecialchars(hash('sha256', $_POST['mdp']));


                // Vérification de l'existence des identifiants de connexion.
                // Puis connexion.
                if ($this->model->findLogin($mail, $mdp)['verifLogin'] == 1) {
                    $login=$this->model->getLogin($mail, $mdp);

                    //Variables de la session.
                    $_SESSION['id_client'] = $login->id;
                    $_SESSION['prenom_client'] = $login->prenom;
                    $_SESSION['nom_client'] = $login->nom;
                    $_SESSION['mail_client'] = $login->mail;
                    $_SESSION['date_naissance_client'] = $login->date_naissance;
                    $_SESSION['adresse_client'] = $login->adresse;
                    $_SESSION['code_postal_client'] = $login->code_postal;
                    $_SESSION['ville_client'] = $login->ville;
                    $_SESSION['tel_client'] = $login->tel;

                    // Redirection de l'utilisateur vers index.php quand la connexion est effectuée.
                    header('location: index.php');
                } else {
                    $informations_incorrectes = "Identifiant ou mot de passe incorrect.";
                }
            }
        }
        else {}
        require ('App/View/getLogin.php');
    }

    // Modification par l'utilisateur de l'adresse mail renseignée.
    public function modif_mail_client() {
        if (isset($_POST['send'])) {
            if (!(empty($_POST['mail']))) {
                $mail = htmlspecialchars($_POST['mail']);
                $id = $_SESSION['id_client'];

                // Vérification de l'existence du mail renseigné dans la base de données.
                // Si le mail est déjà présent dans la base, modification impossible.
                if ($this->model->findMail($mail)['verifMail'] == 0) {
                    $data = "mail = '$mail' WHERE id = '$id'";
                    $modif_mail_client = $this->model->update($data);

                    $mail_base = $_SESSION['mail_client'];

                    //Envoi du mail de confirmation de la modification.
                    $destinataire = $mail;
                    $destinataire_base = $mail_base;
                    $expediteur = 'support@triton.ctutin.fr';
                    $sujet = "Modification de votre adresse mail";
                    $message =
                        'Bonjour,
                    
                    Le mail renseigné à votre compte a été modifié. 
                    
                    La modification sera visible à votre prochaine connexion.              

                    ---------------
                    
                    Ceci est un mail automatique, merci de ne pas y répondre.';
                    $entete = 'From: ' . $expediteur . "\r\n" . 'Reply-To: ' . $expediteur . "\r\n" . 'X-Mailer: PHP/' . phpversion();
                    mail($destinataire, $sujet, $message, $entete);
                    mail($destinataire_base, $sujet, $message, $entete);
                }
                else{
                    $mailVerif=1;
                }
            }
        }
        require ('App/View/getModifUser.php');
    }

    // Modification par l'utilisateur du mot de passe renseigné.
    public function modif_mdp_client() {
        if (isset($_POST['send'])) {
            if (!(empty($_POST['mdp']))) {
                $mdp = htmlspecialchars(hash('sha256', $_POST['mdp']));
                $id = $_SESSION['id_client'];
                $mail = $_SESSION['mail_client'];

                $data = "mdp = '$mdp' WHERE id = '$id'";
                $modif_mdp_client=$this->model->update($data);

                //Envoi du mail de confirmation de la modification.
                $destinataire = $mail;
                $expediteur = 'support@triton.ctutin.fr';
                $sujet = "Modification de votre mot de passe";
                $message =
                    'Bonjour,
                    
                    Votre mot de passe a bien été modifié. 
                    
                    La modification sera visible à votre prochaine connexion.              

                    ---------------
                    
                    Ceci est un mail automatique, merci de ne pas y répondre.';
                $entete = 'From: '.$expediteur. "\r\n" . 'Reply-To: '.$expediteur. "\r\n" . 'X-Mailer: PHP/' . phpversion();
                mail($destinataire, $sujet, $message, $entete);
            }
        }
    }

    // Modification par l'utilisateur de la date de naissance renseignée.
    public function modif_date_naissance_client() {
        if (isset($_POST['send'])) {
            if (!(empty($_POST['date_naissance']))) {
                $date_naissance = htmlspecialchars($_POST['date_naissance']);
                $id = $_SESSION['id_client'];

                $data = "date_naissance = '$date_naissance' WHERE id = '$id'";
                $modif_date_naissance_client=$this->model->update($data);
            }
        }
    }

    // Modification par l'utilisateur de l'adresse renseignée.
    public function modif_adresse_client() {
        if (isset($_POST['send'])) {
            if (!(empty($_POST['adresse']) && empty($_POST['code_postal']) && empty($_POST['ville']))) {
                $adresse = htmlspecialchars($_POST['adresse']);
                $code_postal = htmlspecialchars($_POST['code_postal']);
                $ville = htmlspecialchars($_POST['ville']);
                $id = $_SESSION['id_client'];

                $data = "adresse = '$adresse', code_postal = '$code_postal', ville = '$ville' WHERE id = '$id'";
                $modif_adresse_client=$this->model->update($data);
            }
        }
    }

    // Modification par l'utilisateur du n° de téléphone renseigné.
    public function modif_tel_client() {
        if (isset($_POST['send'])) {
            if (!(empty($_POST['tel']))) {
                $tel = htmlspecialchars($_POST['tel']);
                $id = $_SESSION['id_client'];

                $data = "tel = '$tel' WHERE id = '$id'";
                $modif_tel_client=$this->model->update($data);
            }
        }
    }

    // Suppression par l'utilisateur de son compte.
    public function suppression_compte() {
        if(isset($_POST["send"])) {
            if (!(empty($_POST['mail']) && empty($_POST['mdp']))) {
                $mail = htmlspecialchars($_POST['mail']);
                $mdp = htmlspecialchars(hash('sha256', $_POST['mdp']));
                $id = $_SESSION['id_client'];

                // Vérification de l'existence des identifiants de connexion.
                // Puis suppression.
                if ($this->model->findLogin($mail, $mdp)['verifLogin'] == 1) {
                    $login=$this->model->getLogin($mail, $mdp);

                    $suppression_compte=$this->model->delete($id);

                    //Envoi du mail de confirmation de la suppression du compte.
                    $destinataire = $mail;
                    $expediteur = 'support@triton.ctutin.fr';
                    $sujet = "Suppression de votre compte";
                    $message =
                    'Bonjour,
                    
                    Votre compte a bien été supprimé, et ne figure plus dans notre base de données. 
                    
                    En espérant vous revoir !
                    
                    Triton et toute son équipe.              

                    ---------------
                    
                    Ceci est un mail automatique, merci de ne pas y répondre.';
                    $entete = 'From: '.$expediteur. "\r\n" . 'Reply-To: '.$expediteur. "\r\n" . 'X-Mailer: PHP/' . phpversion();
                    mail($destinataire, $sujet, $message, $entete);

                    // Redirection de l'utilisateur vers logout.php
                    header('location: logout.php');
                } else {
                    $informations_incorrectes = "Identifiant ou mot de passe incorrect.";
                }
            }
        }
        else {}
        require ('App/View/getSupprimerCompte.php');
    }

    // Affiche les informations du compte stockées dans la base de données.
    public function findInfoCompte(){
        require ('App/View/getInfoCompte.php');
    }

    // Affiche la dernière commande effectuée par le client.
    public function findOneCommande(){
        $id = htmlspecialchars($_SESSION['id_client']);
        if ($this->model->findOneCommandeVerif($id)['count']) {
            $derniereCommande = $this->model->findOneCommande($id);

        }
        require ('App/View/getDerniereCommande.php');
    }

    // Affiche l'ensemble des commandes effectuées par le client.
    public function findAllCommande(){
        $id = htmlspecialchars($_SESSION['id_client']);
        $listeCommande=$this->model->findAllCommande($id);

        require ('App/View/getListeCommandes.php');
    }
}