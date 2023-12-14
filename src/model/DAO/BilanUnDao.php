<?php
namespace DAO;
use BO\Bilanun;
use DateTime;
use mysql_xdevapi\Exception;
use PDO;

class BilanUnDao
{
    private PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $query = "SELECT * FROM Bilanun";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $dateBilanUn = new \DateTime();
        $dateBilanUn->setDate(2023,05,15);

        $bil1 = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $bil1[] = new Bilanun(
                $row['idBilanUn'],
                $row['noteEts'],
                $dateBilanUn,
                12,
               15,
                $row['rqBilanUn'],
            );
        }

        return $bil1;
    }

    public function addBilanUn(Bilanun $bilan1)
    {

        try {
            $dateBilanUn = $bilan1->getDateBilanUn();

            $query = "INSERT INTO BilanUn (noteEts, dateBilanUn, noteDossierUn, noteOralUn, rqBilanUn) VALUES (:noteEt, :dateBUn, :noteDoUn, :noteOralU, :rqBilUn)";
            $statement = $this->pdo->prepare($query);
            $statement->bindValue(':noteEt', $bilan1->getNoteEts());
            $statement->bindValue(':dateBUn', $dateBilanUn->format('Y-m-d H:i:s'),PDO::PARAM_STR);
            $statement->bindValue(':noteDoUn', $bilan1->getNoteDossierUn());
            $statement->bindValue(':noteOralU', $bilan1->getNoteOralUn());
            $statement->bindValue(':rqBilUn', $bilan1->getRqBilanUn());
            $statement->execute();

            return $this->pdo->lastInsertId();

        } catch(PDOException $e)
        {
            echo "Erreur : " . $e->getMessage();
        }


    }

    public function updateBilanUn(Bilanun $bilan1)
    {
        $dateBilanUn = $bilan1->getDateBilanUn();

        $query = "UPDATE Bilanun SET noteEts = :noteE, dateBilanUn = :dateB, noteDossierUn = :noteD, noteOralUn = :noteO, rqBilanUn = :rqB WHERE idBilanUn = :idB";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':noteE', $bilan1->getNoteEts());
        $statement->bindValue(':dateB', $dateBilanUn->format('Y-m-d H:i:s'),PDO::PARAM_STR);
        $statement->bindValue(':noteD', $bilan1->getNoteDossierUn());
        $statement->bindValue(':noteO', $bilan1->getNoteOralUn());
        $statement->bindValue(':rqB', $bilan1->getRqBilanUn());
        $statement->bindValue(':idB', $bilan1->getIdBilanUn());
        $statement->execute();
    }



}