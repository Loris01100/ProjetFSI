<?php
namespace DAO;
use BO\Classe;
use PDO;

class ClasseDao
{
    private PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $query = "SELECT * FROM Classe";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $cla = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $cla[] = new Classe(
                $row['idClasse'],
                $row['nomClasse'],
            );
        }

        return $cla;
    }
    public function addClasse(Classe $classe)
    {
        $query = "INSERT INTO Classe (nomClasse) VALUES (:nomC)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':nomC', $classe->getNomClasse());
        $statement->execute();

        return $this->pdo->lastInsertId();
    }
}