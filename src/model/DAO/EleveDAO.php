<?php

namespace DAO;

use PDO;
use BO\Eleve;
use DAO\ClasseDao;
use BO\Classe;

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

    public function getAllelevesSansBilanUn()
    {
        $query = "SELECT e.*, dlbu.dateLimiteUn 
              FROM etudiant e, datelimitebilanun dlbu, bilanun bu 
              WHERE (e.idBilanUn IS NULL AND dlbu.dateLimiteUn < CURRENT_DATE) 
                    OR (e.idBilanUn = bu.idBilanUn AND bu.noteDossierUn IS NULL AND dlbu.dateLimiteUn < CURRENT_DATE) 
              GROUP By e.nomEtu;";

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $eleves = [];
        $classeDao = new ClasseDao($this->pdo);

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $idClasse = $row['idClasse'];
            $classe = $classeDao->getById($idClasse);

            $eleve = new Eleve(
                $row['numEtu'],
                $row['nomEtu'],
                $row['preEtu'],
                0,
                $row['mailEtu'],
                '',
                $row['dateLimiteUn']
            );

            $eleve->setIdClasse($classe);

            $eleves[] = $eleve;
        }

        return $eleves;
    }

    public function getAllelevesSansBilanDeux()
    {
        $query = "SELECT e.*, dlbd.dateLimiteDeux 
              FROM etudiant e, datelimitebilandeux dlbd, bilandeux bd 
              WHERE (e.idBilanDeux IS NULL AND dlbd.dateLimiteDeux < CURRENT_DATE) 
                    OR (e.idBilanDeux = bd.idBilanDeux AND bd.noteDossierDeux IS NULL AND dlbd.dateLimiteDeux < CURRENT_DATE) 
              GROUP BY e.nomEtu, dlbd.dateLimiteDeux;";

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $eleves = [];
        $classeDao = new ClasseDao($this->pdo);

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $idClasse = $row['idClasse'];
            $classe = $classeDao->getById($idClasse);

            $eleve = new Eleve(
                $row['numEtu'],
                $row['nomEtu'],
                $row['preEtu'],
                0,
                $row['mailEtu'],
                '',
                $row['dateLimiteDeux']
            );

            $eleve->setIdClasse($classe);

            $eleves[] = $eleve;
        }

        return $eleves;
    }


}
