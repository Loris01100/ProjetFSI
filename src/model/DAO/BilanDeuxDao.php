<?php
namespace DAO;
use BO\Bilan;
use BO\Bilandeux;
use BO\Bilanun;
use BO\Entreprise;
use PDO;

class BilanDeuxDao
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllBilandeux() {
        $query = "SELECT * FROM bilandeux";
        $result = $this->pdo->query($query);

        if ($result !== false) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return []; // Retourne un tableau vide si aucune donnée n'est récupérée
        }
    }

    public function addBilanDeux($noteO, $noteD, $dateD, $rqB, $sM) {
        $statement = $this->pdo->prepare("INSERT INTO bilandeux (noteOralDeux, noteDossierDeux, dateBilanDeux, rqBilanDeux, sujetMemoire) VALUES (:noteO, :noteD, :dateB, :rqB, :sM)");
        $statement->bindParam(':noteOralDeux', $noteO);
        $statement->bindParam(':noteDossierDeux', $noteD);
        $statement->bindParam(':dateBilanDeux', $dateD);
        $statement->bindParam(':rqBilanDeux', $rqB);
        $statement->bindParam(':sujetMemoire', $sM);

        return $statement->execute();
    }
}