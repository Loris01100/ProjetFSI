<?php
namespace DAO;
use BO\Entreprise;
use PDO;

class EntrerpriseDAO
{

    private PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $query = "SELECT * FROM Entreprise";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $ets = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $ets[] = new Entreprise(
                $row['idEts'],
                $row['nomEts'],
                $row['adresseEts'],
                $row['cpEts'],
                $row['villeEts'],
            );
        }

        return $ets;
    }
    public function addEntreprise(Entreprise $ets)
    {
        $query = "INSERT INTO Entreprise (nomEts, adresseEts, cpEts, villeEts) VALUES (:nomE, :addrE, :cpE, :vilE)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':nomE', $ets->getNomEts());
        $statement->bindValue(':addrE', $ets->getAdresseEts());
        $statement->bindValue(':cpE', $ets->getCpEts());
        $statement->bindValue(':vilE', $ets->getVilleEts());
        $statement->execute();

        return $this->pdo->lastInsertId();
    }

    public function updateEntrerpise(Entreprise $entreprise)
    {
        $query = "UPDATE Entreprise SET nomEts = :nomE, adresseEts = :addrE, cpEts = :cpE, villeEts = :vilE WHERE idEts = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':nomE', $entreprise->getNomEts());
        $statement->bindValue(':addrE', $entreprise->getAdresseEts());
        $statement->bindValue(':cpE', $entreprise->getCpEts());
        $statement->bindValue(':vilE', $entreprise->getVilleEts());
        // You should bind more parameters here as needed
        $statement->bindValue(':id', $entreprise->getIdEts());
        $statement->execute();
    }

    public function deleteEts(int $idEts)
    {
        $query = "DELETE FROM Entreprise WHERE idEts = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idEts);
        $statement->execute();
    }

}