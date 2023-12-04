<?php

namespace DAO;

use BO\Utilisateur;
use PDO;

class UtilisateurDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Utilisateur $utilisateur)
    {
        $query = "INSERT INTO Utilisateur (identifiant, mdpUtilisateur) VALUES (:identifiant, :mdp)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':identifiant', $utilisateur->getIdentifiant());
        $statement->bindValue(':mdp', $utilisateur->getMdp());
        $statement->execute();

        return $this->pdo->lastInsertId();
    }

    public function read(int $idUtilisateur)
    {
        $query = "SELECT idUtilisateur, identifiant, mdpUtilisateur FROM Utilisateur WHERE idUtilisateur = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idUtilisateur);
        $statement->execute();

        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Utilisateur($data['idUtilisateur'], $data['identifiant'], $data['mdpUtilisateur']);
        }

        return null;
    }

    public function update(Utilisateur $utilisateur)
    {
        $query = "UPDATE Utilisateur SET identifiant = :identifiant, mdpUtilisateur = :mdp WHERE idUtilisateur = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':identifiant', $utilisateur->getIdentifiant());
        $statement->bindValue(':mdp', $utilisateur->getMdp());
        $statement->bindValue(':id', $utilisateur->getIdUtilisateur());
        $statement->execute();
    }

    public function delete(int $idUtilisateur)
    {
        $query = "DELETE FROM Utilisateur WHERE idUtilisateur = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idUtilisateur);
        $statement->execute();
    }

    public function getAll()
    {
        $query = "SELECT idUtilisateur, identifiant, mdpUtilisateur FROM Utilisateur";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $utilisateurs = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $utilisateurs[] = new Utilisateur($row['idUtilisateur'], $row['identifiant'], $row['mdpUtilisateur']);
        }

        return $utilisateurs;
    }

    public function findById(int $idUtilisateur): ?Utilisateur
    {
        $query = "SELECT idUtilisateur, identifiant, mdpUtilisateur FROM Utilisateur WHERE idUtilisateur = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idUtilisateur);
        $statement->execute();

        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return new Utilisateur($data['idUtilisateur'], $data['identifiant'], $data['mdpUtilisateur']);
        } else {
            return null;
        }
    }


}
