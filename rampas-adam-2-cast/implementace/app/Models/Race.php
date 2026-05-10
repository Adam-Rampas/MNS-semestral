<?php

class Race
{
    /**
        *Konstruktor
        * Třída reprezentující závod. Obsahuje informace o závodě, jako je jeho ID, sezóna, typ, název, datum, místo konání, poznámka a ID jezdce s nejrychlejším časem.
        * Tato třída slouží jako datový model pro závod a může být použita v různých částech aplikace, například při ukládání do databáze nebo při zobrazení informací o závodě uživateli.
        * @param int|null $id ID závodu, může být null pro nové závody, které ještě nebyly uloženy do databáze.
        * @param int $season_id ID sezóny, ke které závod patří.
        * @param string $type Typ závodu (např. "Grand Prix", "Sprint", "Kvalifikace").
        * @param string $name Název závodu.
        * @param string $date Datum konání závodu ve formátu "YYYY-MM-DD".
        * @param string $location Místo konání závodu.
        * @param string|null $note Volitelná poznámka k závodu.
        * @param int|null $fastest_driver_id Volitelný ID jezdce s nejrychlejším časem, může být null pokud není znám.
        */
    public function __construct(
        public ?int $id,
        public int $season_id,
        public string $type,
        public string $name,
        public string $date,
        public string $location,
        public ?string $note = null,
        public ?int $fastest_driver_id = null
    ){}
}