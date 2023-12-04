<?php

namespace BO;

class Bilanun
{
    private int $idBilanUn;
    private int $noteEts;
    private int $noteBilanUn;
    private string $noteDossierUn;
    private string $noteOralUn;
    private string $rqBilanUn;

    /**
     * @param int $idBilanUn
     * @param int $noteEts
     * @param int $noteBilanUn
     * @param string $noteDossierUn
     * @param string $noteOralUn
     * @param string $rqBilanUn
     */
    public function __construct(int $idBilanUn, int $noteEts, int $noteBilanUn, string $noteDossierUn, string $noteOralUn, string $rqBilanUn)
    {
        $this->idBilanUn = $idBilanUn;
        $this->noteEts = $noteEts;
        $this->noteBilanUn = $noteBilanUn;
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

    public function getNoteBilanUn(): int
    {
        return $this->noteBilanUn;
    }

    public function setNoteBilanUn(int $noteBilanUn): void
    {
        $this->noteBilanUn = $noteBilanUn;
    }

    public function getNoteDossierUn(): string
    {
        return $this->noteDossierUn;
    }

    public function setNoteDossierUn(string $noteDossierUn): void
    {
        $this->noteDossierUn = $noteDossierUn;
    }

    public function getNoteOralUn(): string
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