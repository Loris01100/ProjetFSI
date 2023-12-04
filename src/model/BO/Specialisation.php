<?php

namespace BO;

class Specialisation
{
    private int $idSpe;
    private string $nomSpe;

    /**
     * @param int $idSpe
     * @param string $nomSpe
     */
    public function __construct(int $idSpe, string $nomSpe)
    {
        $this->idSpe = $idSpe;
        $this->nomSpe = $nomSpe;
    }

    public function getIdSpe(): int
    {
        return $this->idSpe;
    }

    public function setIdSpe(int $idSpe): void
    {
        $this->idSpe = $idSpe;
    }

    public function getNomSpe(): string
    {
        return $this->nomSpe;
    }

    public function setNomSpe(string $nomSpe): void
    {
        $this->nomSpe = $nomSpe;
    }

}