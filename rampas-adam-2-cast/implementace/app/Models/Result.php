<?php

class Result
{
    /**
        * Třída reprezentující výsledek závodu. Obsahuje informace o závodě, jezdcovi, pozici a získaných bodech.
        * Tato třída slouží jako datový model pro výsledek a může být použita v různých částech aplikace, například při ukládání do databáze nebo při zobrazení informací o výsledku uživateli.
        */
    public function __construct(
        public int $race_id,
        public int $driver_id,
        public int $position,
        public int $points
    ){}
}