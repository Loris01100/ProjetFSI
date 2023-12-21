<?php

namespace DAO;

use PDO;
use BO\DateLimiteBilanUn;

class DateLimiteBilanUnDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getDateLimiteById(int $idDateLimite): ?DateLimiteBilanUn
    {
        $query = "SELECT * FROM DateLimiteBilanUn WHERE idDateLimiteBilanUn = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':id', $idDateLimite);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$row || !isset($row['dateLimiteUn'])) {
            return null;
        }

        return new DateLimiteBilanUn($row['idDateLimiteBilanUn'], new \DateTime($row['dateLimiteUn']));
    }




    public function updateDateLimite(DateLimite $dateLimite)
    {
        $query = "UPDATE DateLimiteBilanUn SET dateLimiteBilanUn = :dateLimiteBilanUn WHERE idDateLimiteBilanUn = :idDateLimiteBilanUn";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':dateLimiteBilanUn', $dateLimite->getDateLimite()->format('Y-m-d H:i:s'));
        $statement->bindValue(':idDateLimiteBilanUn', $dateLimite->getIdDateLimite());
        $statement->execute();
    }

}
