<?php
namespace BO;
class BilanDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllBilan($idBilan)
    {
        $statement = $this->pdo->prepare("SELECT * FROM Bilan");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBilan($date, $noteEntreprise, $noteDossier, $noteOral, $sujetMemoire) {
        $statement = $this->pdo->prepare("INSERT INTO Bilan (date, noteEntreprise, noteDossier, noteOral, sujetMemoire) VALUES (:date, :noteEntreprise, :noteDossier, :noteOral, :sujetMemoire)");
        $statement->execute([':date' => $date, ':noteEntreprise' => $noteEntreprise, ':noteDossier' => $noteDossier, ':noteOral' => $noteOral, ':sujetMemoire' => $sujetMemoire]);

        return $statement->rowCount() > 0;
    }

    public function updateBilan($idBilan, $nvdate, $nvnoteEntreprise, $nvnoteDossier, $nvnoteOral, $nvsujetMemoire) {
        $statement = $this->pdo->prepare("UPDATE Bilan SET date = :nvdate, noteEntreprise = :nvnoteEntreprise, noteDossier =:nvnoteDossier, noteOral =:nvnoteOral, sujetMemoire =:nvsujetMemoire WHERE id = :idBilan");
        $statement->execute([':nvdate' => $nvdate, ':nvnoteEntreprise' => $nvnoteEntreprise, ':nvnoteDossier' => $nvnoteDossier, ':nvnoteOral' => $nvnoteOral, ':nvsujetMemoire' => $nvsujetMemoire, ':idBilan' => $idBilan]);

        return $statement->rowCount() > 0;
    }

    public function deleteBilan($idBilan) {
        $statement = $this->pdo->prepare("DELETE FROM Bilan WHERE id = :idBilan");
        $statement->execute([':idBilan' => $idBilan]);

        return $statement->rowCount() > 0;
    }

    public function getBilanByEleve($idBilan) {
        $statement = $this->pdo->prepare("SELECT idBilan FROM Bilan WHERE id = :idBilan");
        $statement->execute([':idBilan' => $idBilan]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['idBilan'])) {
            return $result['idBilan'];
        }

        return null;
    }
}