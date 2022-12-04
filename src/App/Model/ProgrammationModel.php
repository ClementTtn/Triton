<?php

namespace App\Model;

use App\Entity\Programmation;
use PDO;

class ProgrammationModel extends Model
{
    protected string $table;
    protected string $ordre;

    public function __construct()
    {
        parent::__construct();
        $this->table = "programmation";
        $this->ordre = "date_programmation";
    }

}