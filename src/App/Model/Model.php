<?php

// Model globale pour les controllers.

namespace App\Model;

use App\Config\Database;

use PDO;
abstract class Model
{
    protected $connexion;
    protected string $table;
    protected string $ordre;
    protected string $elements;

    public function __construct()
    {
        $this->connexion = (new DataBase ())->getConnection();
    }

    // Affichage de données

    // Afficher un élément.
    public function findOne(int $id) : array {
        $req = $this->connexion->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
        $req->BindParam(":id",$id);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    // Afficher tous les éléments.
    public function findAll() : array {
        $req = $this->connexion->prepare("SELECT * FROM " . $this->table . " ORDER BY " . $this->ordre . " ");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Afficher le prochain élément (en fonction de la date).
    public function findProchain() : array {
        $req = $this->connexion->prepare("SELECT * FROM " . $this->table . " ORDER BY " . $this->ordre . " LIMIT 1");
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    // Afficher 3 éléments de façon aléatoire.
    public function findAlea() : array {
        $req = $this->connexion->prepare("SELECT * FROM " . $this->table . " ORDER BY RAND() LIMIT 3 ");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    // Vérifier l'existence d'une commande.
    public function findOneCommandeVerif(int $id) : array{
        $req = $this->connexion->prepare("SELECT COUNT(*) as count ". $this->join . " WHERE C.id = :id ORDER BY " . $this->ordre . " DESC LIMIT 1");
        $req->BindParam(":id",$id);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    // Afficher une commande.
    public function findOneCommande(int $id) : array{
        $req = $this->connexion->prepare("SELECT D.id_commande, C.date_commande, C.prix_commande, P.nom_artiste, P.id, D.qte_place " . $this->join . " WHERE C.id = :id ORDER BY " . $this->ordre . " DESC LIMIT 1");
        $req->BindParam(":id",$id);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    // Afficher toutes les commandes.
    public function findAllCommande(int $id) : array{
        $req = $this->connexion->prepare("SELECT D.id_commande, C.date_commande, C.prix_commande, P.nom_artiste, P.id, D.qte_place " . $this->join . " WHERE C.id = :id ORDER BY " . $this->ordre . " DESC");
        $req->BindParam(":id",$id);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }




    // Insertion de données.
    public function insert(string $data) : int{
        $req = $this->connexion->prepare("INSERT INTO " . $data . " ");
        $req->execute();
        return $req->rowCount();
    }




    // Mise à jour de données.

    // Modification de données.
    public function update(string $data): int {
        $req = $this->connexion->prepare("UPDATE " .$this->table . " SET " . $data . " ");
        $req->execute();
        return $req->rowCount();
    }

    // Suppression de données.
    public function delete(int $id): void{
        $req = $this->connexion->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
        $req->BindParam(":id",$id);
        $req->execute();
    }

    // Suppression d'un administrateur.
    public function deleteAdmin(string $mail): void{
        $req = $this->connexion->prepare("DELETE FROM " . $this->table . " WHERE mail = :mail");
        $req->BindParam(":mail",$mail);
        $req->execute();
    }

    //Suppression d'une programmation.
    public function deleteProg(string $nom_artiste): void{
        $req = $this->connexion->prepare("DELETE FROM " . $this->table . " WHERE nom_artiste = :nom_artiste");
        $req->BindParam(":nom_artiste",$nom_artiste);
        $req->execute();
    }

    //Transfert de données vers une autre table.
    public function transfert(string $data1, $data2, $nom_artiste): int{
        $req = $this->connexion->prepare("INSERT INTO " . $data1 . " SELECT " . $data2 . " WHERE nom_artiste = :nom_artiste");
        $req->BindParam(":nom_artiste",$nom_artiste);
        $req->execute();
        return $req->rowCount();
    }




    //Formulaires

    // Vérification de l'existence d'un mail.
    public function findMail(string $mail) : array {
        $req = $this->connexion->prepare("SELECT COUNT(*) AS verifMail FROM " . $this->table . " WHERE mail = :mail");
        $req->BindParam(":mail",$mail);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    // Vérification de l'existence d'identifiants de connexion.
    public function findLogin(string $mail, string $mdp) : array {
        $req = $this->connexion->prepare("SELECT COUNT(*) AS verifLogin FROM " . $this->table . " WHERE mail = :mail AND mdp = :mdp");
        $req->BindParam(":mail",$mail);
        $req->BindParam(":mdp",$mdp);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    // Connexion à un espace (client ou admin).
    public function getLogin(string $mail, string $mdp) : object {
        $req = $this->connexion->prepare("SELECT " . $this->elements . " FROM " . $this->table . " WHERE mail = :mail AND mdp = :mdp");
        $req->BindParam(":mail",$mail);
        $req->BindParam(":mdp",$mdp);
        $req->execute();
        return $req->fetch(PDO::FETCH_OBJ);
    }
}