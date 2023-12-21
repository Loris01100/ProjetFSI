<?php

namespace DAO;

use BO\Tuteur;
use PDO;

class TuteurDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(Tuteur $tuteur)
    {
        $query = "INSERT INTO TuteurEcole (nomTutEco, preTutEco, telTutEco, mailTutEco, privilegeTutEco, cheminPhoto, idUtilisateur) 
                  VALUES (:nom, :prenom, :telephone, :email, :privilege, :cheminPhoto, :idUtilisateur)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':nom', $tuteur->getNomTuteur());
        $statement->bindValue(':prenom', $tuteur->getPrenomTuteur());
        $statement->bindValue(':telephone', $tuteur->getTelTuteur());
        $statement->bindValue(':email', $tuteur->getMailTuteur());
        $statement->bindValue(':privilege', 'Tuteur');
        $statement->bindValue(':cheminPhoto', '/chemin');
        $statement->bindValue(':idUtilisateur', $tuteur->getIdUtilisateur());
        $statement->execute();

        return $this->pdo->lastInsertId();
    }

    public function read(int $idTuteur)
    {
        $query = "SELECT * FROM TuteurEcole WHERE numTutEco = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idTuteur);
        $statement->execute();

        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $tuteur = new Tuteur(
                $data['idUtilisateur'],
                '',
                '',
                $data['nomTutEco'],
                $data['preTutEco'],
                $data['telTutEco'],
                $data['mailTutEco'],
                $data['cheminPhoto'],
                ''
            );

            return $tuteur;
        }

        return null;
    }

    public function update(Tuteur $tuteur)
    {
        $query = "UPDATE TuteurEcole SET nomTutEco = :nom, preTutEco = :prenom, telTutEco = :telephone, mailTutEco = :email WHERE numTutEco = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':nom', $tuteur->getNomTuteur());
        $statement->bindValue(':prenom', $tuteur->getPrenomTuteur());
        $statement->bindValue(':telephone', $tuteur->getTelTuteur());
        $statement->bindValue(':email', $tuteur->getMailTuteur());
        $statement->bindValue(':id', $tuteur->getIdUtilisateur()); // Assurez-vous que cela correspond à la clé primaire dans TuteurEcole
        $statement->execute();
    }

    public function delete(int $idTuteur)
    {
        $query = "DELETE FROM TuteurEcole WHERE numTutEco = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idTuteur);
        $statement->execute();
    }


    public function getAll()
    {
        $query = "SELECT * FROM TuteurEcole";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $tuteurs = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

            $utilisateur = (new UtilisateurDAO($this->pdo))->findById($row['idUtilisateur']);

            $tuteur = new Tuteur(
                $row['idUtilisateur'],
                '',
                '',
                $row['nomTutEco'],
                $row['preTutEco'],
                $row['telTutEco'],
                $row['mailTutEco'],
                ''
            );

            $tuteurs[] = $tuteur;
        }

        return $tuteurs;
    }

    public function getById(int $id)
    {
        $query = "SELECT * FROM TuteurEcole WHERE numTutEco = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        $tuteur = new Tuteur(
            $row['numTutEco'],
            '',
            '',
            $row['nomTutEco'],
            $row['preTutEco'],
            $row['telTutEco'],
            $row['mailTutEco'],
            ''
        );

        return $tuteur;
    }

}
