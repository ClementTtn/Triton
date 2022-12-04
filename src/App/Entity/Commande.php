<?php

namespace App\Entity;

class Commande
{
    private $id_commande;
    private $id;
    private $date_commande;
    private $prix_commande;

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
    public function getDateCommande()
    {
        return $this->date_commande;
    }

    /**
     * @param mixed $date_commande
     */
    public function setDateCommande($date_commande): void
    {
        $this->date_commande = $date_commande;
    }

    /**
     * @return mixed
     */
    public function getPrixCommande()
    {
        return $this->prix_commande;
    }

    /**
     * @param mixed $prix_commande
     */
    public function setPrixCommande($prix_commande): void
    {
        $this->prix_commande = $prix_commande;
    }



    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return ("Admin");
    }
}