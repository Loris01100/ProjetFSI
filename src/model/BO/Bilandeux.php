<?php

namespace BO;

class Bilandeux
{
    private int $idBilanDeux;
    private ?float $noteOralDeux;
    private ?float $noteDossierDeux;
    private \DateTime $dateBilanDeux;
    private ?string $rqBilanDeux;
    private ?string $sujetMemoire;

    public function __construct(int $idBilanDeux, ?float $noteOralDeux, ?float $noteDossierDeux, \DateTime $dateBilanDeux, ?string $rqBilanDeux, ?string $sujetMemoire)
    {
        $this->idBilanDeux = $idBilanDeux;
        $this->noteOralDeux = $noteOralDeux;
        $this->noteDossierDeux = $noteDossierDeux;
        $this->dateBilanDeux = $dateBilanDeux;
        $this->rqBilanDeux = $rqBilanDeux;
        $this->sujetMemoire = $sujetMemoire;
    }

    public function getIdBilanDeux(): int
    {
        return $this->idBilanDeux;
    }

    public function setIdBilanDeux(int $idBilanDeux): void
    {
        $this->idBilanDeux = $idBilanDeux;
    }

    public function getNoteOralDeux(): ?float
    {
        return $this->noteOralDeux;
    }

    public function setNoteOralDeux(int $noteOralDeux): void
    {
        $this->noteOralDeux = $noteOralDeux;
    }

    public function getNoteDossierDeux(): ?float
    {
        return $this->noteDossierDeux;
    }

    public function setNoteDossierDeux(int $noteDossierDeux): void
    {
        $this->noteDossierDeux = $noteDossierDeux;
    }

    public function getDateBilanDeux(): ?\DateTime
    {
        return $this->dateBilanDeux;
    }

    public function setDateBilanDeux(\DateTime $dateBilanDeux): void
    {
        $this->dateBilanDeux = $dateBilanDeux;
    }

    public function getRqBilanDeux(): ?string
    {
        return $this->rqBilanDeux;
    }

    public function setRqBilanDeux(string $rqBilanDeux): void
    {
        $this->rqBilanDeux = $rqBilanDeux;
    }

    public function getSujetMemoire(): ?string
    {
        return $this->sujetMemoire;
    }

    public function setSujetMemoire(string $sujetMemoire): void
    {
        $this->sujetMemoire = $sujetMemoire;
    }
}