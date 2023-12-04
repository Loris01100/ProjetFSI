<?php
namespace DAO;
use BO\Classe;
use PDO;

class ClasseDao
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllClasse() {
        $query = "SELECT * FROM classe";
        $result = $this->pdo->query($query);

        if ($result !== false) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return []; // Retourne un tableau vide si aucune donnée n'est récupérée
        }
    }
}