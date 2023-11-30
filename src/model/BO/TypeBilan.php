<?php
namespace BO;
class TypeBilan extends Bilan
{
    private int $idTypeBilan;
    private bool $type1;
    private bool $type2;

    /**
     * @param $idTypeBilan
     * @param $type1
     * @param $type2
     */
    public function __construct($idTypeBilan, $type1, $type2)
    {
        $this->idTypeBilan = $idTypeBilan;
        $this->type1 = $type1;
        $this->type2 = $type2;
    }

    /**
     * @return mixed
     */
    public function getIdTypeBilan()
    {
        return $this->idTypeBilan;
    }

    /**
     * @param mixed $idTypeBilan
     */
    public function setIdTypeBilan($idTypeBilan)
    {
        $this->idTypeBilan = $idTypeBilan;
    }

    /**
     * @return mixed
     */
    public function getType1()
    {
        return $this->type1;
    }

    /**
     * @param mixed $type1
     */
    public function setType1($type1)
    {
        $this->type1 = $type1;
    }

    /**
     * @return mixed
     */
    public function getType2()
    {
        return $this->type2;
    }

    /**
     * @param mixed $type2
     */
    public function setType2($type2)
    {
        $this->type2 = $type2;
    }


}