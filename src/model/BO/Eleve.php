<?php

namespace BO;

class Eleve
{
    private int $idEleve;
    private string $nomEleve;
    private string $prenomEleve;
    private int $telEleve;
    private string $mailEleve;
    private string $entrepriseEleve;
    private Classe $idClasse;

    public function __construct(int $idEleve, string $nomEleve, string $prenomEleve, int $telEleve, string $mailEleve, string $entrepriseEleve)
    {
        $this->idEleve = $idEleve;
        $this->nomEleve = $nomEleve;
        $this->prenomEleve = $prenomEleve;
        $this->telEleve = $telEleve;
        $this->mailEleve = $mailEleve;
        $this->entrepriseEleve = $entrepriseEleve;
    }

    public function getIdEleve(): int
    {
        return $this->idEleve;
    }

    public function setIdEleve(int $idEleve): void
    {
        $this->idEleve = $idEleve;
    }

    public function getNomEleve(): string
    {
        return $this->nomEleve;
    }

    public function setNomEleve(string $nomEleve): void
    {
        $this->nomEleve = $nomEleve;
    }

    public function getPrenomEleve(): string
    {
        return $this->prenomEleve;
    }

    public function setPrenomEleve(string $prenomEleve): void
    {
        $this->prenomEleve = $prenomEleve;
    }

    public function getTelEleve(): int
    {
        return $this->telEleve;
    }

    public function setTelEleve(int $telEleve): void
    {
        $this->telEleve = $telEleve;
    }

    public function getMailEleve(): string
    {
        return $this->mailEleve;
    }

    public function setMailEleve(string $mailEleve): void
    {
        $this->mailEleve = $mailEleve;
    }

    public function getEntrepriseEleve(): string
    {
        return $this->entrepriseEleve;
    }

    public function setEntrepriseEleve(string $entrepriseEleve): void
    {
        $this->entrepriseEleve = $entrepriseEleve;
    }
    public function getIdClasse(): Classe
    {
        return $this->idClasse;
    }

    public function setIdClasse(Classe $idClasse): void
    {
        $this->idClasse = $idClasse;
    }
}
