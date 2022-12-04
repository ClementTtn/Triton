<?php

// Traitement en rapport avec la table "Commande".

namespace App\Controller;

use App\Model\CommandeModel;

class ControllerCommande{
    private $model;

    public function __construct()
    {
        $this->model = new CommandeModel();
    }

    // Détermine si une commande a déjà été effectué par le client.
    public function findOneCommandeVerif(){
        $id = htmlspecialchars($_SESSION['id_client']);
        $verifCommande=$this->model->findOneCommandeVerif($id);

        require ('App/View/getDerniereCommande.php');
    }
}
