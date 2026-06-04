<?php
declare(strict_types=1);

class Voorstelling
{
    private array $tickets = [];

    public function __construct(
        private Film $film,
        private Zaal $zaal,
        private string $datum,
        private string $tijd,
        private float $ticketprijs
    ) {}

    public function verkoopTicket(string $naam): Ticket
    {
        if ($this->isVol()) {
            throw new Exception("Zaal is vol");
        }

        $ticket = new Ticket($naam, $this);
        $this->tickets[] = $ticket;
        return $ticket;
    }

    public function getResterendePlaatsen(): int
    {
        return $this->zaal->getStoelen() - count($this->tickets);
    }

    public function isVol(): bool
    {
        return $this->getResterendePlaatsen() === 0;
    }

    public function getInkomsten(): float
    {
        return count($this->tickets) * $this->ticketprijs;
    }

    public function getTicketAantal(): int
    {
        return count($this->tickets);
    }

    // Helpers voor Ticket
    public function getFilmTitel(): string { return $this->film->getSamenvatting(); }
    public function getDatum(): string { return $this->datum; }
    public function getTijd(): string { return $this->tijd; }
}
