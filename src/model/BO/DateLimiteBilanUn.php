<?php

namespace BO;

use DateTime;

class DateLimiteBilanUn
{
    private int $idDateLimite;
    private DateTime $dateLimite;

    public function __construct(int $idDateLimite, DateTime $dateLimite)
    {
        $this->idDateLimite = $idDateLimite;
        $this->dateLimite = $dateLimite;
    }

    public function getIdDateLimite(): int
    {
        return $this->idDateLimite;
    }

    public function getDateLimite(): DateTime
    {
        return $this->dateLimite;
    }

    public function setDateLimite(DateTime $dateLimite): void
    {
        $this->dateLimite = $dateLimite;
    }
}

