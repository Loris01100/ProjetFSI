<?php
namespace DAO;
use BO\Entreprise;
use PDO;

class EntrerpriseDAO
{


    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllEntreprise() {
        $query = "SELECT * FROM entreprise";
        $result = $this->pdo->query($query);

        if ($result !== false) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return []; // Retourne un tableau vide si aucune donnée n'est récupérée
        }
    }
    public function addEntreprise($nomEt, $adrE, $cpE, $vilE)
    {
        $query = "INSERT INTO entreprise (nomEts, adresseEts, cpEts, villeEts) VALUES (:nom, :addr, :cp, :vil)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':nomEts', $nomEt);
        $statement->bindParam(':adresseEts', $adrE);
        $statement->bindParam(':cpEts', $cpE);
        $statement->bindParam(':villeEts', $vilE);

        return $statement->execute();
    }

    public function updateEntreprise($idEts, $nomEts, $adresseEts, $cpEts, $villeEts) {
        $statement = $this->pdo->prepare("UPDATE entreprise SET nomEts = :nvnom, adresseEts = :nvadr, cpEts =:nvcp, villeEts =:nvvil WHERE idEts = :id");
        $statement->execute([':nvnom' => $nomEts, ':nvadr' => $adresseEts, ':nvcp' => $cpEts, ':nvvil' => $villeEts, ':idEts' => $idEts]);

        return $statement->rowCount() > 0;
    }

}