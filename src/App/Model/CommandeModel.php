<?php

namespace App\Model;

use App\Entity\Programmation;
use PDO;

class CommandeModel extends Model
{
    protected string $table;

    public function __construct()
    {
        parent::__construct();
        $this->table = "commande";
    }

}