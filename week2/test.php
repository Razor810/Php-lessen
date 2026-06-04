<?php

declare(strict_types=1);


// Laad jouw klassen (pas de paden aan als nodig)

require 'Film.php';

require 'Zaal.php';

require 'Voorstelling.php';

require 'Ticket.php';


// ── Stap 1: Films aanmaken ──────────────────────────────────────

$inception = new Film("Inception", "Christopher Nolan", 148, 12);

$deadpool = new Film("Deadpool 3", "Shawn Levy", 127, 16);


// ── Stap 2: Zalen aanmaken ──────────────────────────────────────

$zaakIMAX = new Zaal(1, 120, true); // IMAX Zaal 1, 120 stoelen

$zaalNormaal = new Zaal(2, 80, false); // Zaal 2, 80 stoelen


// ── Stap 3: Voorstellingen plannen ─────────────────────────────

$avondfilm = new Voorstelling(
  $inception,
  $zaakIMAX,
  "2025-03-07",
  "20:00",

  14.50
);

$middag = new Voorstelling(
  $deadpool,
  $zaalNormaal,
  "2025-03-07",
  "15:00",

  11.00
);


// ── Stap 4: Kaartjes verkopen ───────────────────────────────────

$t1 = $avondfilm->verkoopTicket("Lisa");

$t2 = $avondfilm->verkoopTicket("Tom");

$t3 = $avondfilm->verkoopTicket("Sara");

$t4 = $middag->verkoopTicket("Mark");


// ── Stap 5: Uitvoer ────────────────────────────────────────────

echo "=== FILMS ===<br>";

echo $inception->getSamenvatting() . '<br>';

echo $deadpool->getSamenvatting() . '<br>';


echo '<br>=== ZALEN ===<br>';

echo $zaakIMAX->getZaalnaam() . '<br>'; // IMAX Zaal 1

echo $zaalNormaal->getZaalnaam() . '<br>'; // Zaal 2


echo '<br>=== VOORSTELLINGEN ===<br>';

echo $avondfilm->getResterendePlaatsen() . ' plaatsen over<br>'; // 117

echo 'Vol? ' . ($avondfilm->isVol() ? 'Ja' : 'Nee') . '<br>'; // Nee

echo 'Inkomsten: EUR ' . $avondfilm->getInkomsten() . '<br>'; // 43.5


echo '<br>=== TICKETS ===<br>';

echo $t1->getBevestiging() . '<br>';

echo $t2->getBevestiging() . '<br>';

echo $t3->getBevestiging() . '<br>';


echo '<br>=== LEEFTIJDSCHECK ===<br>';

echo $inception->isGeschiktVoor(15) ? 'Geschikt' : 'Niet geschikt'; // Geschikt

echo '<br>';

echo $deadpool->isGeschiktVoor(14) ? 'Geschikt' : 'Niet geschikt'; // Niet geschikt

echo '<br>';


echo '<br>=== FILMDUUR ===<br>';

echo $inception->getDuurAlsString() . '<br>'; // 2 uur en 28 minuten

echo $deadpool->getDuurAlsString() . '<br>'; // 2 uur en 7 minuten