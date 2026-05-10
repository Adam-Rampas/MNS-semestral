<?php 

/**
    * Třída reprezentující tým. Obsahuje informace o týmu, jako je jeho ID a název.
    * Tato třída slouží jako datový model pro tým a může být použita v různých částech aplikace, například při ukládání do databáze nebo při zobrazení informací o týmu uživateli.
    */
class Team
{
    /**
        * Konstruktor třídy Team. Přijímá ID a název týmu a inicializuje odpovídající vlastnosti.
        *
        * @param int|null $id ID týmu, může být null pro nové týmy, které ještě nebyly uloženy do databáze.
        * @param string $name Název týmu.
        */
    public function __construct(
        public ?int $id, 
        public string $name) {
    }

    /**
        * Getter pro ID týmu.
        *
        * @return int|null ID týmu, nebo null pokud tým ještě nebyl uložen do databáze.
        */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
        * Getter pro název týmu.
        *
        * @return string Název týmu.
        */  
    public function getName(): string
    {
        return $this->name;
    } 
}