<?php

namespace BO;

use BO\Utilisateur;

class Tuteur extends Utilisateur
{
    private string $nomTuteur;
    private string $prenomTuteur;
    private string $telTuteur;
    private string $mailTuteur;

    private string $cheminPhoto;

    public function __construct(int $idUtilisateur, string $identifiant, string $mdp, string $nomTuteur, string $prenomTuteur, string $telTuteur, string $mailTuteur, string $cheminPhoto)
    {
        parent::__construct($idUtilisateur, $identifiant, $mdp);

        $this->nomTuteur = $nomTuteur;
        $this->prenomTuteur = $prenomTuteur;
        $this->telTuteur = $telTuteur;
        $this->mailTuteur = $mailTuteur;
        $this->cheminPhoto = $cheminPhoto;
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

    public function getCheminPhoto(): string
    {
        return $this->cheminPhoto;
    }

    public function setCheminPhoto(string $cheminPhoto): void
    {
        $this->cheminPhoto = $cheminPhoto;
    }


}
