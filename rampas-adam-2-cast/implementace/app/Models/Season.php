<?php

class Season
{
    /**
        * Třída reprezentující sezónu. Obsahuje informace o sezóně, jako je její ID, rok a název.
        * Tato třída slouží jako datový model pro sezónu a může být použita v různých částech aplikace, například při ukládání do databáze nebo při zobrazení informací o sezóně uživateli.
        */
    public function __construct(
        public ?int $id,
        public int $year,
        public string $name

    ){}
}