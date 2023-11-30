<?php
namespace BO;
class EntrepriseDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllEntreprise($idEntreprise)
    {
        $statement = $this->pdo->prepare("SELECT * FROM Entreprise");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEntreprise($nomEntreprise, $adresseEntreprise) {
        $statement = $this->pdo->prepare("INSERT INTO Entreprise (nomEntreprise, adresseEntreprise) VALUES (:nomEntreprise, :adresseEntreprise)");
        $statement->execute([':nomEntreprise' => $nomEntreprise, ':adresseEntreprise' => $adresseEntreprise]);

        return $statement->rowCount() > 0;
    }

    public function updateEntreprise($idEntreprise, $nvnomEntreprise, $nvadresseEntreprise) {
        $statement = $this->pdo->prepare("UPDATE Entreprise SET nomEntreprise = :nvnomEntreprise, adresseEntrerprise = :nvadresseEntreprise WHERE id = :idEntreprise");
        $statement->execute([':nvnomEntreprise' => $nvnomEntreprise, ':nvnadresseEntreprise' => $nvadresseEntreprise, ':idEntrerprise' => $idEntreprise]);

        return $statement->rowCount() > 0;
    }

    public function deleteEntreprise($idEntreprise) {
        $statement = $this->pdo->prepare("DELETE FROM Entreprise WHERE id = :idEntreprise");
        $statement->execute([':idEntreprise' => $idEntreprise]);

        return $statement->rowCount() > 0;
    }
}