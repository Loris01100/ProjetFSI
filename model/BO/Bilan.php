<?php

class Bilan
{
    private $idBilan;
    private $date;
    private $noteEntreprise;
    private $noteDossier;
    private $noteOral;
    private $sujetMemoire;

    /**
     * @param $idBilan
     * @param $date
     * @param $noteEntreprise
     * @param $noteDossier
     * @param $noteOral
     * @param $sujetMemoire
     */
    public function __construct($idBilan, $date, $noteEntreprise, $noteDossier, $noteOral, $sujetMemoire)
    {
        $this->idBilan = $idBilan;
        $this->date = $date;
        $this->noteEntreprise = $noteEntreprise;
        $this->noteDossier = $noteDossier;
        $this->noteOral = $noteOral;
        $this->sujetMemoire = $sujetMemoire;
    }

    /**
     * @return mixed
     */
    public function getIdBilan()
    {
        return $this->idBilan;
    }

    /**
     * @param mixed $idBilan
     */
    public function setIdBilan($idBilan)
    {
        $this->idBilan = $idBilan;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getNoteEntreprise()
    {
        return $this->noteEntreprise;
    }

    /**
     * @param mixed $noteEntreprise
     */
    public function setNoteEntreprise($noteEntreprise)
    {
        $this->noteEntreprise = $noteEntreprise;
    }

    /**
     * @return mixed
     */
    public function getNoteDossier()
    {
        return $this->noteDossier;
    }

    /**
     * @param mixed $noteDossier
     */
    public function setNoteDossier($noteDossier)
    {
        $this->noteDossier = $noteDossier;
    }

    /**
     * @return mixed
     */
    public function getNoteOral()
    {
        return $this->noteOral;
    }

    /**
     * @param mixed $noteOral
     */
    public function setNoteOral($noteOral)
    {
        $this->noteOral = $noteOral;
    }

    /**
     * @return mixed
     */
    public function getSujetMemoire()
    {
        return $this->sujetMemoire;
    }

    /**
     * @param mixed $sujetMemoire
     */
    public function setSujetMemoire($sujetMemoire)
    {
        $this->sujetMemoire = $sujetMemoire;
    }


}