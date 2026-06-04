<?php
declare(strict_types=1);

class Film
{
    public function __construct(
        private string $titel,
        private string $regisseur,
        private int $duurInMinuten,
        private int $ageRestriction
    ) {}

    public function getSamenvatting(): string
    {
        return sprintf(
            "%s (%s) - %d minuten - Leeftijd %d+",
            $this->titel,
            $this->regisseur,
            $this->duurInMinuten,
            $this->ageRestriction
        );
    }

    public function getDuurAlsString(): string
    {
        $uren = intdiv($this->duurInMinuten, 60);
        $minuten = $this->duurInMinuten % 60;

        return sprintf("%d uur en %d minuten", $uren, $minuten);
    }

    public function isGeschiktVoor(int $leeftijd): bool
    {
        return $leeftijd >= $this->ageRestriction;
    }
}
