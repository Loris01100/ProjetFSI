<?php
namespace DAO;
class SectionDAO
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllSection($idSection)
    {
        $statement = $this->pdo->prepare("SELECT * FROM Section");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}