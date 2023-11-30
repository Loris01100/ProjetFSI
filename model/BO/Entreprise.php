<?php

class Entreprise
{
    private int $idEntreprise;
    private string $nomEntreprise;
    private string  $adresseEntreprise;

    /**
     * @param $idEntreprise
     * @param $nomEntreprise
     * @param $adresseEntreprise
     */
    public function __construct($idEntreprise, $nomEntreprise, $adresseEntreprise)
    {
        $this->idEntreprise = $idEntreprise;
        $this->nomEntreprise = $nomEntreprise;
        $this->adresseEntreprise = $adresseEntreprise;
    }

    /**
     * @return mixed
     */
    public function getIdEntreprise()
    {
        return $this->idEntreprise;
    }

    /**
     * @param mixed $idEntreprise
     */
    public function setIdEntreprise($idEntreprise)
    {
        $this->idEntreprise = $idEntreprise;
    }

    /**
     * @return mixed
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * @param mixed $nomEntreprise
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;
    }

    /**
     * @return mixed
     */
    public function getAdresseEntreprise()
    {
        return $this->adresseEntreprise;
    }

    /**
     * @param mixed $adresseEntreprise
     */
    public function setAdresseEntreprise($adresseEntreprise)
    {
        $this->adresseEntreprise = $adresseEntreprise;
    }

}