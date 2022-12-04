<?php
namespace App\Entity;


class Programmation
{
    private $id_artiste;
    private $nom_artiste;
    private $date_programmation;
    private $description;
    private $img_artiste;
    private $tarif;



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
    public function getId_artiste()
    {
        return $this->id_artiste;
    }

    /**
     * @param mixed $id_artiste
     */
    public function setId($id_artiste): void
    {
        $this->id_artiste = $id_artiste;
    }

    /**
     * @return mixed
     */
    public function getNomArtiste()
    {
        return $this->nom_artiste;
    }

    /**
     * @param mixed $nom_artiste
     */
    public function setNomArtiste($nom_artiste): void
    {
        $this->nom_artiste = $nom_artiste;
    }

    /**
     * @return mixed
     */
    public function getDateProgrammation()
    {
        return $this->date_programmation;
    }

    /**
     * @param mixed $date_programmation
     */
    public function setDateProgrammation($date_programmation): void
    {
        $this->date_programmation = $date_programmation;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImgArtiste()
    {
        return $this->img_artiste;
    }

    /**
     * @param mixed $img_artiste
     */
    public function setImgArtiste($img_artiste): void
    {
        $this->img_artiste = $img_artiste;
    }

    /**
     * @return mixed
     */
    public function getTarif()
    {
        return $this->tarif;
    }

    /**
     * @param mixed $tarif
     */
    public function setTarif($tarif): void
    {
        $this->tarif = $tarif;
    }


    public function __toString() : string{
        return ("Programmation");
    }

}