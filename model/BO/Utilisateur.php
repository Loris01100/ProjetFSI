<?php

namespace BO;

class Utilisateur
{

    private int $idUtilisateur;
    private string $identifiant;
    private string $mdp;


    public function __construct(int $idUtilisateur, string $identifiant, string $mdp)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->identifiant = $identifiant;
        $this->mdp = $mdp;
    }


    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    }

    public function getmdp()
    {
        return $this->mdp;
    }

    public function setMdp($mdp)
    {
        $this->identifiant = $mdp;
    }


}