<?php

require_once __DIR__ . '/../Models/Season.php';
require_once __DIR__ . '/SeasonRepositoryInterface.php';

/**
    * Třída implementující repozitář pro sezóny. Umožňuje ukládat a načítat sezóny z databáze pomocí PDO.
    * Implementuje rozhraní SeasonRepositoryInterface, což zajišťuje konzistenci a usnadňuje testování.
    */
class SeasonRepository implements SeasonRepositoryInterface
{
    private PDO $connection;

    /**
        * Konstruktor třídy SeasonRepository. Přijímá PDO připojení k databázi, které bude použito pro všechny operace se sezónami.
        *
        * @param PDO $connection PDO připojení k databázi.
        */  
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
        * Uloží sezónu do databáze.
        *
        * @param Season $season Sezóna k uložení.
        * @return int ID nově vytvořené sezóny.
        */
    public function save(Season $season): int
    {
        $stmt = $this->connection->prepare("INSERT INTO seasons (year, name) VALUES (:year, :name)");
        $stmt->execute([
            'year' => $season->year,
            'name' => $season->name
        ]);
        return $this->connection->lastInsertId();
    }

    /**
        * Načte všechny sezóny z databáze.
        *
        * @return array Pole objektů Season reprezentujících všechny sezóny v databázi.
        */  
    public function findAll(): array
    {
        $stmt = $this->connection->query("SELECT * FROM seasons ORDER BY year DESC");
        $seasons = [];
        while ($row = $stmt->fetch()) {
            $seasons[] = new Season($row['id'], $row['year'], $row['name']);
        }
        return $seasons;
    }
}
