<?php
namespace BO;
class Entreprise
{
    private int $idEts;
    private string $nomEts;
    private string $adresseEts;
    private string $cpEts;
    private string $villeEts;

    /**
     * @param int $idEts
     * @param string $nomEts
     * @param string $adresseEts
     * @param string $cpEts
     * @param string $villeEts
     */
    public function __construct(int $idEts, string $nomEts, string $adresseEts, string $cpEts, string $villeEts)
    {
        $this->idEts = $idEts;
        $this->nomEts = $nomEts;
        $this->adresseEts = $adresseEts;
        $this->cpEts = $cpEts;
        $this->villeEts = $villeEts;
    }

    public function getIdEts(): int
    {
        return $this->idEts;
    }

    public function setIdEts(int $idEts): void
    {
        $this->idEts = $idEts;
    }

    public function getNomEts(): string
    {
        return $this->nomEts;
    }

    public function setNomEts(string $nomEts): void
    {
        $this->nomEts = $nomEts;
    }

    public function getAdresseEts(): string
    {
        return $this->adresseEts;
    }

    public function setAdresseEts(string $adresseEts): void
    {
        $this->adresseEts = $adresseEts;
    }

    public function getCpEts(): string
    {
        return $this->cpEts;
    }

    public function setCpEts(string $cpEts): void
    {
        $this->cpEts = $cpEts;
    }

    public function getVilleEts(): string
    {
        return $this->villeEts;
    }

    public function setVilleEts(string $villeEts): void
    {
        $this->villeEts = $villeEts;
    }

}