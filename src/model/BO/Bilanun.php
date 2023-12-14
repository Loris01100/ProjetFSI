<?php

namespace BO;




class Bilanun
{
    private int $idBilanUn;
    private ?float $noteEts;
    private \DateTime $dateBilanUn;
    private ?float $noteDossierUn;
    private ?float $noteOralUn;
    private ?string $rqBilanUn;


    public function __construct(int $idBilanUn, ?float $noteEts, \DateTime $dateBilanUn, ?float $noteDossierUn, ?float $noteOralUn, ?string $rqBilanUn)
    {
        $this->idBilanUn = $idBilanUn;
        $this->noteEts = $noteEts;
        $this->dateBilanUn = $dateBilanUn;
        $this->noteDossierUn = $noteDossierUn;
        $this->noteOralUn = $noteOralUn;
        $this->rqBilanUn = $rqBilanUn;
    }

    public function getIdBilanUn(): int
    {
        return $this->idBilanUn;
    }

    public function setIdBilanUn(int $idBilanUn): void
    {
        $this->idBilanUn = $idBilanUn;
    }

    public function getNoteEts(): int
    {
        return $this->noteEts;
    }

    public function setNoteEts(int $noteEts): void
    {
        $this->noteEts = $noteEts;
    }

    public function getDateBilanUn(): \DateTime
    {
        return $this->dateBilanUn;
    }

    public function setDateBilanUn(\DateTime $dateBilanUn): void
    {
        $this->dateBilanUn = $dateBilanUn;
    }

    public function getNoteDossierUn(): int
    {
        return $this->noteDossierUn;
    }

    public function setNoteDossierUn(string $noteDossierUn): void
    {
        $this->noteDossierUn = $noteDossierUn;
    }

    public function getNoteOralUn(): int
    {
        return $this->noteOralUn;
    }

    public function setNoteOralUn(string $noteOralUn): void
    {
        $this->noteOralUn = $noteOralUn;
    }

    public function getRqBilanUn(): string
    {
        return $this->rqBilanUn;
    }

    public function setRqBilanUn(string $rqBilanUn): void
    {
        $this->rqBilanUn = $rqBilanUn;
    }
}