<?php
declare(strict_types=1);

class Zaal
{
    public function __construct(
        private int $nummer,
        private int $aantalStoelen,
        private bool $isIMAX
    ) {}

    public function getZaalnaam(): string
    {
        return ($this->isIMAX ? "IMAX Zaal " : "Zaal ") . $this->nummer;
    }

    public function getStoelen(): int
    {
        return $this->aantalStoelen;
    }
}
