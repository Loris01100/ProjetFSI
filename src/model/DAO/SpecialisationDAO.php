<?php
namespace DAO;
use BO\Specialisation;
use PDO;
class SpecialisationDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $query = "SELECT * FROM Specialisation";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $ets = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $ets[] = new Specialisation(
                $row['idSpe'],
                $row['nomSpe'],
            );
        }

        return $ets;
    }
}