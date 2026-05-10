<?php

require_once __DIR__ . '/../Models/Driver.php';
require_once __DIR__ . '/DriverRepositoryInterface.php';

/**
    * Implementace repozitáře jezdců. Poskytuje konkrétní logiku pro ukládání a načítání jezdců z databáze pomocí PDO.
    * Tato třída implementuje metody definované v rozhraní DriverRepositoryInterface, což umožňuje snadnou výměnu implementace v budoucnu.
    */
class DriverRepository implements DriverRepositoryInterface
{
    private PDO $db;

    /**
        * Konstruktor přijímá PDO instanci pro přístup k databázi. Tím se umožňuje snadné testování a oddělení logiky přístupu k datům.
        * PDO je bezpečný způsob, jak pracovat s databází, protože podporuje připravené dotazy, které pomáhají předcházet SQL injection útokům.
        */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
        * Ukládá nového jezdce do databáze. Používá připravené dotazy pro bezpečné vkládání dat.
        * Vrací true, pokud bylo uložení úspěšné, nebo false v případě chyby.
        * @param Driver $driver Objekt Driver obsahující informace o jezdcovi, který má být uložen.
        * @return bool True pokud bylo uložení úspěšné, false pokud došlo k chybě.
        */
    public function save(Driver $driver): bool
    {
        $stmt = $this->db->prepare("INSERT INTO drivers (name, number, team_id) VALUES (:name, :number, :team_id)");
        return $stmt->execute([
            'name' => $driver->name,
            'number' => $driver->number,
            'team_id' => $driver->team_id
        ]);
    }

    /**
        * Najde všechny jezdce v databázi.
        * Vrací pole objektů Driver.
        * @return array Pole objektů Driver reprezentujících všechny jezdce v databázi.
        */
    public function findAll(): array
    {
        $sql = "SELECT d.*, t.name as team_name 
                FROM drivers d 
                LEFT JOIN teams t ON d.team_id = t.id 
                ORDER BY d.name ASC";
        
        $stmt = $this->db->query($sql);
        $drivers = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $drivers[] = new Driver(
                (int)$row['id'],
                $row['name'],
                (int)$row['number'],
                (int)$row['team_id'],
                $row['team_name']
            );
        }
        return $drivers;
    }
}
