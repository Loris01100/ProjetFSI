<?php
namespace DAO;
use BO\Bilan;
use BO\Bilandeux;
use BO\Bilanun;
use BO\Entreprise;
use PDO;

class BilanDeuxDao
{
    private PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {

        $query = "SELECT * FROM Bilandeux";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $dateBilandeux = new \DateTime();
        $dateBilandeux->setDate(2023,05,15);

        $bil2 = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $bil2[] = new Bilandeux(
                $row['idBilanDeux'],
                12,
                12,
                $dateBilandeux,
                $row['rqBilanDeux'],
                $row['sujetMemoire'],
            );
        }

        return $bil2;
    }

    public function addBilanDeux(Bilandeux $bilan2)
    {
        $dateBilanDeux = $bilan2->getDateBilanDeux();

        $query = "INSERT INTO BilanDeux (noteOralDeux, noteDossierDeux, dateBilanDeux, rqBilanDeux, sujetMemoire) VALUES (:noteO2, :noteD2, :dateBDeux, :rqB2, :sM2)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':noteO2', $bilan2->getNoteOralDeux());
        $statement->bindValue(':noteD2', $bilan2->getNoteDossierDeux());
        $statement->bindValue(':dateBDeux', $dateBilanDeux->format('Y-m-d H:i:s'),PDO::PARAM_STR);
        $statement->bindValue(':rqB2', $bilan2->getRqBilanDeux());
        $statement->bindValue(':sM2', $bilan2->getSujetMemoire());
        $statement->execute();

        return $this->pdo->lastInsertId();
    }

    public function updateBilanDeux(Bilandeux $bilan2)
    {
        $dateBilanDeux = $bilan2->getDateBilanDeux();

        $query = "UPDATE BilanDeux SET noteOralDeux = :noteO, noteDossierDeux = :noteD, dateBilanDeux = :dateB2, rqBilanDeux = :rqB2, sujetMemoire = :sM WHERE idBilanDeux = :idB2";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':noteO', $bilan2->getNoteOralDeux());
        $statement->bindValue(':noteD', $bilan2->getNoteDossierDeux());
        $statement->bindValue(':dateB2', $dateBilanDeux->format('Y-m-d H:i:s'),PDO::PARAM_STR);
        $statement->bindValue(':rqB2', $bilan2->getRqBilanDeux());
        $statement->bindValue(':sM', $bilan2->getSujetMemoire());
        $statement->bindValue(':idB2', $bilan2->getIdBilanDeux());
        $statement->execute();
    }

    public function read(int $id){
        $query="SELECT * FROM bilandeux WHERE idBilanDeux = :id;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue('id',$id,PDO::PARAM_INT);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if($data){
            $datebilandeux = new \DateTime($data["dateBilanDeux"]);
            $bilanDeux = new Bilandeux(
                $data["idBilanDeux"],
                $data["noteOralDeux"],
                $data["noteDossierDeux"],
                $datebilandeux,
                $data["rqBilanDeux"],
                $data["sujetMemoire"]
            );
            return $bilanDeux;
        }
        return null;
    }
}