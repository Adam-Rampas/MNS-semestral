<?php

require_once __DIR__ . '/../Models/Team.php';
require_once __DIR__ . '/../Models/Season.php';
require_once __DIR__ . '/TeamRepositoryInterface.php';

    /**
        * Třída implementující repozitář pro týmy. Umožňuje ukládat a načítat týmy z databáze pomocí PDO.
        * Implementuje rozhraní TeamRepositoryInterface, což zajišťuje konzistenci a usnadňuje testování.
        */
class TeamRepository implements TeamRepositoryInterface
{
    private \PDO $connection;

    /**
        * Konstruktor třídy TeamRepository. Přijímá PDO připojení k databázi, které bude použito pro všechny operace s týmy.
        *
        * @param \PDO $connection PDO připojení k databázi.
        */
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
        * Uloží tým do databáze.
        *
        * @param Team $team Tým k uložení.
        * @return int ID nově vytvořeného týmu.
        */
    public function save(Team $team): int
    {
        $stmt = $this->connection->prepare('INSERT INTO teams (name) VALUES (:name)');
        $stmt->execute(['name' => $team->name]);
        return $this->connection->lastInsertId();
    }

    /**
        * Načte všechny týmy z databáze.
        *
        * @return array Pole objektů Team reprezentujících všechny týmy v databázi.
        */
    public function findAll(): array
    {
        $stmt = $this->connection->query('SELECT * FROM teams ORDER BY name ASC');
        $teams = [];
        while ($row = $stmt->fetch()) {
            $teams[] = new Team($row['id'], $row['name']);
        }
        return $teams;
    }

}