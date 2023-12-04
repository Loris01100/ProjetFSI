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

        $bil2 = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $bil2[] = new Bilandeux(
                $row['idBilanDeux'],
                12,
                12,
                $row['dateBilanDeux'],
                $row['rqBilanDeux'],
                $row['sujetMemoire'],
            );
        }

        return $bil2;
    }
}