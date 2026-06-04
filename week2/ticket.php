<?php
declare(strict_types=1);

class Ticket
{
    public function __construct(
        private string $naam,
        private Voorstelling $voorstelling
    ) {}

    public function getBevestiging(): string
    {
        return sprintf(
            "Ticket voor %s (%s om %s) op naam van %s",
            $this->voorstelling->getFilmTitel(),
            $this->voorstelling->getDatum(),
            $this->voorstelling->getTijd(),
            $this->naam
        );
    }
}
