<?php

namespace DAO;

use PDO;
use BO\Eleve;

class EleveDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addEleve(Eleve $eleve)
    {
        $query = "INSERT INTO Etudiant (nomEtu, preEtu, mailEtu) VALUES (:nom, :prenom, :email)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':nom', $eleve->getNomEleve());
        $statement->bindValue(':prenom', $eleve->getPrenomEleve());
        $statement->bindValue(':email', $eleve->getMailEleve());
        $statement->execute();

        return $this->pdo->lastInsertId();
    }

    public function getAll()
    {
        $query = "SELECT * FROM Etudiant";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $eleves = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $eleves[] = new Eleve(
                $row['numEtu'],
                $row['nomEtu'],
                $row['preEtu'],
                0,
                $row['mailEtu'],
                ''
            );
        }

        return $eleves;
    }

    public function updateEleve(Eleve $eleve)
    {
        $query = "UPDATE Etudiant SET nomEtu = :nom, preEtu = :prenom, mailEtu = :email WHERE numEtu = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':nom', $eleve->getNomEleve());
        $statement->bindValue(':prenom', $eleve->getPrenomEleve());
        $statement->bindValue(':email', $eleve->getMailEleve());
        // You should bind more parameters here as needed
        $statement->bindValue(':id', $eleve->getIdEleve());
        $statement->execute();
    }

    public function deleteEleve(int $idEleve)
    {
        $query = "DELETE FROM Etudiant WHERE numEtu = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idEleve);
        $statement->execute();
    }
}
