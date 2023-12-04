<?php

namespace BO;

use BO\Utilisateur;

class Tuteur extends Utilisateur
{
    private string $nomTuteur;
    private string $prenomTuteur;
    private string $telTuteur;
    private string $mailTuteur;
    private string $eleveTuteur;

    public function __construct(int $idUtilisateur, string $identifiant, string $mdp, string $nomTuteur, string $prenomTuteur, string $telTuteur, string $mailTuteur, string $eleveTuteur)
    {
        parent::__construct($idUtilisateur, $identifiant, $mdp);

        $this->nomTuteur = $nomTuteur;
        $this->prenomTuteur = $prenomTuteur;
        $this->telTuteur = $telTuteur;
        $this->mailTuteur = $mailTuteur;
        $this->eleveTuteur = $eleveTuteur;
    }


    public function getNomTuteur(): string
    {
        return $this->nomTuteur;
    }

    public function setNomTuteur(string $nomTuteur): void
    {
        $this->nomTuteur = $nomTuteur;
    }

    public function getPrenomTuteur(): string
    {
        return $this->prenomTuteur;
    }

    public function setPrenomTuteur(string $prenomTuteur): void
    {
        $this->prenomTuteur = $prenomTuteur;
    }

    public function getTelTuteur(): string
    {
        return $this->telTuteur;
    }

    public function setTelTuteur(string $telTuteur): void
    {
        $this->telTuteur = $telTuteur;
    }

    public function getMailTuteur(): string
    {
        return $this->mailTuteur;
    }

    public function setMailTuteur(string $mailTuteur): void
    {
        $this->mailTuteur = $mailTuteur;
    }

    public function getEleveTuteur(): string
    {
        return $this->eleveTuteur;
    }

    public function setEleveTuteur(string $eleveTuteur): void
    {
        $this->eleveTuteur = $eleveTuteur;
    }

    // Vous pourriez ajouter d'autres méthodes spécifiques aux tuteurs ici
}
