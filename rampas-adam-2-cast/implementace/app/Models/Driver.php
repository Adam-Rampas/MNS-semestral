<?php
/**
    * Třída reprezentující jezdce. Obsahuje informace o jezdcovi, jako je jeho ID, jméno, číslo, ID týmu a název týmu.
    * Tato třída slouží jako datový model pro jezdce a může být použita v různých částech aplikace, například při ukládání do databáze nebo při zobrazení informací o jezdcovi uživateli.
    */
class Driver
{
    /**
        * Konstruktor třídy Driver. Přijímá ID, jméno, číslo, ID týmu a volitelně název týmu a inicializuje odpovídající vlastnosti.
        *
        * @param int|null $id ID jezdce, může být null pro nové jezdce, kteří ještě nebyli uloženi do databáze.
        * @param string $name Jméno jezdce.
        * @param int $number Číslo jezdce.
        * @param int $team_id ID týmu, ke kterému jezdec patří.
        * @param string|null $team_name Volitelný název týmu, může být null pokud není znám.
        */
    public function __construct(
        public ?int $id,
        public string $name,
        public int $number,
        public int $team_id,
        public ?string $team_name = null
    ){}
}