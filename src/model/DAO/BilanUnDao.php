<?php
namespace DAO;
use BO\Bilanun;
use PDO;

class BilanUnDao
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllBilanUn() {
        $query = "SELECT * FROM bilanun";
        $result = $this->pdo->query($query);

        if ($result !== false) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return []; // Retourne un tableau vide si aucune donnée n'est récupérée
        }
    }
}