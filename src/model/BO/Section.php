<?php
namespace BO;
class Section
{
    private int $idSection;
    private string $nomSection;
    private int $nbEleve;

    /**
     * @param $idSection
     * @param $nomSection
     * @param $nbEleve
     */
    public function __construct($idSection, $nomSection, $nbEleve)
    {
        $this->idSection = $idSection;
        $this->nomSection = $nomSection;
        $this->nbEleve = $nbEleve;
    }

    /**
     * @return mixed
     */
    public function getIdSection()
    {
        return $this->idSection;
    }

    /**
     * @param mixed $idSection
     */
    public function setIdSection($idSection)
    {
        $this->idSection = $idSection;
    }

    /**
     * @return mixed
     */
    public function getNomSection()
    {
        return $this->nomSection;
    }

    /**
     * @param mixed $nomSection
     */
    public function setNomSection($nomSection)
    {
        $this->nomSection = $nomSection;
    }

    /**
     * @return mixed
     */
    public function getNbEleve()
    {
        return $this->nbEleve;
    }

    /**
     * @param mixed $nbEleve
     */
    public function setNbEleve($nbEleve)
    {
        $this->nbEleve = $nbEleve;
    }

}