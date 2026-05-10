<?php

require_once __DIR__ . '/../Models/Result.php';
require_once __DIR__ . '/../Strategies/PointsStrategy.php';
require_once __DIR__ . '/ResultRepositoryInterface.php';

/**
    * Třída implementující repozitář pro výsledky. Umožňuje ukládat a načítat výsledky z databáze pomocí PDO.
    * Implementuje rozhraní ResultRepositoryInterface, což zajišťuje konzistenci a usnadňuje testování.
    * Používá strategii pro výpočet bodů, což umožňuje flexibilitu při různých typech závodů.
    */
class ResultRepository implements ResultRepositoryInterface
{
    private PDO $db;
    private PointsStrategy $pointsStrategy;

    public function __construct(PDO $db, PointsStrategy $pointsStrategy)
    {
        $this->db = $db;
        $this->pointsStrategy = $pointsStrategy;
    }

    /**
        * Uloží výsledek do databáze.
        *
        * @param Result $result Výsledek k uložení.
        * @return bool Výsledek uložení.
        */
    public function save(Result $result): bool
    {
        $calculatedPoints = $this->pointsStrategy->calculatePoints($result->position);

        $stmt = $this->db->prepare("INSERT INTO results (race_id, driver_id, position, points) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $result->race_id,
            $result->driver_id,
            $result->position,
            $calculatedPoints
        ]);
    }

    /**
        * Načte aktuální pořadí závodníků podle získaných bodů.
        *
        * @return array Pole s pořadím závodníků a jejich týmy.
        */  
    public function getStandings(): array
    {
        $sql = "SELECT d.name as driver_name, t.name as team_name, SUM(r.points) as total_points 
                FROM results r
                JOIN drivers d ON r.driver_id = d.id
                JOIN teams t ON d.team_id = t.id
                GROUP BY d.id
                ORDER BY total_points DESC";
        
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
        * Načte nejnovější výsledky z databáze.
        *
        * @param int $limit Počet výsledků k načtení.
        * @return array Pole s nejnovějšími výsledky.
        */
    public function getLatestResults(int $limit = 2): array
    {
        $sql = "SELECT d.name, res.position, res.points 
                FROM results res 
                JOIN drivers d ON res.driver_id = d.id 
                ORDER BY res.race_id DESC, res.position ASC
                LIMIT :limit";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
