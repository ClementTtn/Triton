<?php

namespace App\Model;

use App\Entity\Programmation;
use PDO;

class ClientModel extends Model
{
    protected string $table;
    protected string $elements;
    protected string $join;
    protected string $ordre;

    public function __construct()
    {
        parent::__construct();
        $this->table = "client";
        $this->elements = "id, prenom, nom, mail, date_naissance, adresse, code_postal, ville, tel";
        $this->join = "FROM detail_commande D JOIN commande C ON C.id_commande = D.id_commande 
                                              JOIN programmation P ON P.id = D.id";
        $this->ordre = "D.id_commande";
    }

}