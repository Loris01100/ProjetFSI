<?php

namespace BO;

class Classe
{
private int $idClasse;
private string $nomClasse;

    /**
     * @param int $idClasse
     * @param string $nomClasse
     */
    public function __construct(int $idClasse, string $nomClasse)
    {
        $this->idClasse = $idClasse;
        $this->nomClasse = $nomClasse;
    }

    public function getIdClasse(): int
    {
        return $this->idClasse;
    }

    public function setIdClasse(int $idClasse): void
    {
        $this->idClasse = $idClasse;
    }

    public function getNomClasse(): string
    {
        return $this->nomClasse;
    }

    public function setNomClasse(string $nomClasse): void
    {
        $this->nomClasse = $nomClasse;
    }

}