<?php
namespace DAO;
use BO\Specialisation;
use PDO;
class SpecialisationDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllSpecialisation() {
        $query = "SELECT * FROM specialisation";
        $result = $this->pdo->query($query);

        if ($result !== false) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return []; // Retourne un tableau vide si aucune donnée n'est récupérée
        }
    }
}