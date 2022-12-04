<?php

namespace App\Entity;

class Detail_commande
{
    private $id_commande;
    private $id;
    private $qte_place;

    public function __construct(array $data){
        $this->hydrate($data);
    }

    public function hydrate(array $donnees) : void
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);

            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdCommande()
    {
        return $this->id_commande;
    }

    /**
     * @param mixed $id_commande
     */
    public function setIdCommande($id_commande): void
    {
        $this->id_commande = $id_commande;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getQtePlace()
    {
        return $this->qte_place;
    }

    /**
     * @param mixed $qte_place
     */
    public function setQtePlace($qte_place): void
    {
        $this->qte_place = $qte_place;
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return ("Admin");
    }
}