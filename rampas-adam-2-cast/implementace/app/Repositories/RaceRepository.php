<?php

require_once __DIR__ . '/../Models/Race.php';
require_once __DIR__ . '/RaceRepositoryInterface.php';
/**
    * Třída implementující repozitář pro závody. Umožňuje ukládat a načítat závody z databáze pomocí PDO.
    * Implementuje rozhraní RaceRepositoryInterface, což zajišťuje konzistenci a usnadňuje testování.
    */
class RaceRepository implements RaceRepositoryInterface
{
    private PDO $connection;

    /**
        * Konstruktor třídy RaceRepository. Přijímá PDO připojení k databázi, které bude použito pro všechny operace se závody.
        *
        * @param PDO $connection PDO připojení k databázi.
        */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
        * Uloží závod do databáze.
        *
        * @param Race $race Závod k uložení.
        * @return int ID nově vytvořeného závodu.
        */
    public function save(Race $race): int
    {
        $stmt = $this->connection->prepare("INSERT INTO races (season_id, type, name, date, location, note, fastest_driver_id) VALUES (:season_id, :type, :name, :date, :location, :note, :fastest_driver_id)");
        $stmt->execute([
            'season_id' => $race->season_id,
            'type' => $race->type,
            'name' => $race->name,
            'date' => $race->date,
            'location' => $race->location,
            'note' => $race->note,
            'fastest_driver_id' => $race->fastest_driver_id
        ]);
        return $this->connection->lastInsertId();
    }

    /**
        * Načte všechny závody z databáze.
        *
        * @return array Pole
        * @return array Pole objekt
        */
    public function findAll(): array
    {
        $stmt = $this->connection->query("SELECT * FROM races ORDER BY date DESC");
        $races = [];
        while ($row = $stmt->fetch()) {
            $races[] = new Race($row['id'], $row['season_id'], $row['type'], $row['name'], $row['date'], $row['location'], $row['note'], $row['fastest_driver_id']);
        }
        return $races;
    }

        /**
            * Načte závod podle ID z databáze.
            * @param int $id ID závodu k načtení.
            * @return Race|null
        */
    public function findById(int $id): ?Race
    {
        $stmt = $this->connection->prepare("SELECT * FROM races WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if (!$row) return null;
        return new Race(
            (int)$row['id'],
            (int)$row['season_id'],
            $row['type'],
            $row['name'],
            $row['date'],
            $row['location'],
            $row['note'],
            (int)$row['fastest_driver_id']
        );
    }   
}