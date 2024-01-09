<?php

namespace BO;

class MaitreApp
{
    private int $idMaitreApp;
    private string $nomMaitreApp;
    private string $preMaitreApp;
    private string $telMaitreApp;
    private string $mailMaitreApp;


    public function __construct(int $idMaitreApp, string $nomMaitreApp, string $preMaitreApp, string $telMaitreApp, string $mailMaitreApp)
    {
        $this->idMaitreApp = $idMaitreApp;
        $this->nomMaitreApp = $nomMaitreApp;
        $this->preMaitreApp = $preMaitreApp;
        $this->telMaitreApp = $telMaitreApp;
        $this->mailMaitreApp = $mailMaitreApp;
    }

    public function getIdMaitreApp(): int
    {
        return $this->idMaitreApp;
    }

    public function setIdMaitreApp(int $idMaitreApp): void
    {
        $this->idMaitreApp = $idMaitreApp;
    }

    public function getNomMaitreApp(): string
    {
        return $this->nomMaitreApp;
    }

    public function setNomMaitreApp(string $nomMaitreApp): void
    {
        $this->nomMaitreApp = $nomMaitreApp;
    }

    public function getPreMaitreApp(): string
    {
        return $this->preMaitreApp;
    }

    public function setPreMaitreApp(string $preMaitreApp): void
    {
        $this->preMaitreApp = $preMaitreApp;
    }

    public function getTelMaitreApp(): string
    {
        return $this->telMaitreApp;
    }

    public function setTelMaitreApp(string $telMaitreApp): void
    {
        $this->telMaitreApp = $telMaitreApp;
    }

    public function getMailMaitreApp(): string
    {
        return $this->mailMaitreApp;
    }

    public function setMailMaitreApp(string $mailMaitreApp): void
    {
        $this->mailMaitreApp = $mailMaitreApp;
    }

}