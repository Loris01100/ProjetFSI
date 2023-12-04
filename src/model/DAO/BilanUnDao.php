<?php
namespace DAO;
use BO\Bilanun;
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

        $bil1 = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $bil1[] = new Bilanun(
                $row['idBilanUn'],
                $row['noteEts'],
                12,
                12,
               15,
                $row['rqBilanUn'],
            );
        }

        return $bil1;
    }

    public function addBilanUn(Bilanun $bilan1)
    {
        $query = "INSERT INTO BilanUn (noteEts, noteBilanUn, noteDossierUn, noteOralUn, rqBilanUn) VALUES (:noteEt, :noteBUn, :noteDoUn, :noteOralU, :rqBiUn)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':noteEt', $bilan1->getNoteEts());
        $statement->bindValue(':noteBUn', $bilan1->getNoteBilanUn());
        $statement->bindValue(':noteDoUn', $bilan1->getNoteDossierUn());
        $statement->bindValue(':noteOralU', $bilan1->getNoteOralUn());
        $statement->bindValue(':rqBilUn', $bilan1->getRqBilanUn());
        $statement->execute();

        return $this->pdo->lastInsertId();
    }
}