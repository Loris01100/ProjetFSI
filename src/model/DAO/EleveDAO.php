<?php
namespace DAO;

use PDO;
use BO\Eleve;
use DAO\ClasseDao;
use BO\Classe;
use DAO\TuteurDAO;
use BO\Tuteur;
use BO\Bilanun;

class EleveDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addEleve(Eleve $eleve)
    {
        $query = "INSERT INTO Etudiant (nomEtu, preEtu, mailEtu) VALUES (:nom, :prenom, :email)";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':nom', $eleve->getNomEleve());
        $statement->bindValue(':prenom', $eleve->getPrenomEleve());
        $statement->bindValue(':email', $eleve->getMailEleve());
        $statement->execute();

        return $this->pdo->lastInsertId();
    }

    public function getAll()
    {
        $query = "SELECT * FROM Etudiant";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $eleves = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $eleves[] = new Eleve(
                $row['numEtu'],
                $row['nomEtu'],
                $row['preEtu'],
                0,
                $row['mailEtu'],
                ''
            );
        }

        return $eleves;
    }

    public function updateEleve(Eleve $eleve)
    {
        $query = "UPDATE Etudiant SET nomEtu = :nom, preEtu = :prenom, mailEtu = :email WHERE numEtu = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':nom', $eleve->getNomEleve());
        $statement->bindValue(':prenom', $eleve->getPrenomEleve());
        $statement->bindValue(':email', $eleve->getMailEleve());
        // You should bind more parameters here as needed
        $statement->bindValue(':id', $eleve->getIdEleve());
        $statement->execute();
    }

    public function deleteEleve(int $idEleve)
    {
        $query = "DELETE FROM Etudiant WHERE numEtu = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idEleve);
        $statement->execute();
    }

    public function getAllelevesSansBilanUn()
    {
        $query = "SELECT e.* FROM etudiant e 
    LEFT JOIN bilanun bu ON e.idBilanUn = bu.idBilanUn 
    LEFT JOIN datelimitebilanun dlbu ON bu.idDateLimiteBilanUn = dlbu.idDateLimiteBilanUn AND dlbu.dateLimiteUn < CURRENT_DATE
                WHERE e.idBilanUn IS NULL or bu.noteDossierUn IS NULL;";

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $eleves = [];
        $classeDao = new ClasseDao($this->pdo);
        $tuteurDAO = new TuteurDAO($this->pdo);

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $idClasse = $row['idClasse'];
            $classe = $classeDao->getById($idClasse);
             $idTuteur = $row['numTutEco'];
            $tuteur = $tuteurDAO->read($idTuteur);

            $eleve = new Eleve(
                $row['numEtu'],
                $row['nomEtu'],
                $row['preEtu'],
                0,
                $row['mailEtu'],
                ''
            );
            $eleve->setNumTuteur($tuteur);
            $eleve->setIdClasse($classe);

            $eleves[] = $eleve;
        }

        return $eleves;
    }

    public function getAllelevesSansBilanDeux()
    {
        $query = "SELECT e.* FROM etudiant e 
    LEFT JOIN bilandeux bd ON e.idBilanUn = bd.idBilanDeux 
    LEFT JOIN datelimitebilandeux dlbd ON bd.idDateLimiteBilanDeux = dlbd.idDateLimiteBilanDeux AND dlbd.dateLimiteDeux < CURRENT_DATE
                WHERE e.idBilanUn IS NULL or bd.noteDossierDeux IS NULL;";

        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $eleves = [];
        $classeDao = new ClasseDao($this->pdo);
        $tuteurDAO = new TuteurDAO($this->pdo);

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $idClasse = $row['idClasse'];
            $classe = $classeDao->getById($idClasse);
            $idTuteur = $row['numTutEco'];
            $tuteur = $tuteurDAO->read($idTuteur);

            $eleve = new Eleve(
                $row['numEtu'],
                $row['nomEtu'],
                $row['preEtu'],
                0,
                $row['mailEtu'],
                ''
            );
            $eleve->setNumTuteur($tuteur);
            $eleve->setIdClasse($classe);

            $eleves[] = $eleve;
        }

        return $eleves;
    }

    public function read(int $idEleve)
    {
        $query = "SELECT * FROM Etudiant WHERE numEtu = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idEleve);
        $statement->execute();

        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            $eleve = new Eleve(
                $data['numEtu'],
                $data['nomEtu'],
                $data['preEtu'],
                0,
                $data['mailEtu'],
                ''
            );


            return $eleve;
        }

        return null;
    }



    public function getallBilanDeuxByEtu(int $idEleve){
        $query = "SELECT e.idBilanDeux FROM etudiant e WHERE e.numEtu = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idEleve);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if($data && $data["idBilanDeux"] !== null){
            $idBilanDeux = $data["idBilanDeux"];
            $bilandDeuxDAO = new BilanDeuxDao($this->pdo);
            return $bilandDeuxDAO->read($idBilanDeux);
        }
        return null;
    }

    public function getallBilanUnByEtu(int $idEleve){
        $query = "SELECT e.idBilanUn FROM etudiant e WHERE e.numEtu = :id;";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idEleve);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        if($data && $data["idBilanUn"] !== null){
            $idBilanUn = $data["idBilanUn"];
            $bilanUnDAO = new BilanUnDao($this->pdo);
            return $bilanUnDAO->read($idBilanUn);
        }
        return null;
    }



}
