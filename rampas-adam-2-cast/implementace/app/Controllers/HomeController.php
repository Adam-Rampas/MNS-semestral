<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Repositories/SeasonRepository.php';
require_once __DIR__ . '/../Repositories/TeamRepository.php';
require_once __DIR__ . '/../Repositories/DriverRepository.php';
require_once __DIR__ . '/../Repositories/ResultRepository.php';
require_once __DIR__ . '/../Strategies/StandardPointsStrategy.php';

    /**
    * Třída HomeController slouží k obsluze HTTP požadavků týkajících se hlavní stránky aplikace. Obsahuje metodu index(), která načítá základní data z databáze (sezóny, týmy, jezdce a poslední výsledky) a zobrazuje je pomocí view.
    * Používá SeasonRepository, TeamRepository, DriverRepository a ResultRepository pro získávání dat z databáze. Pro výpočet bodů u výsledků používá StandardPointsStrategy.
    */  
class HomeController {
    public function index() {
        $db = Database::getConnection();

        //jen pár případů pro ukázku
        $seasons = (new SeasonRepository($db))->findAll();
        $teams = (new TeamRepository($db))->findAll();
        $drivers = (new DriverRepository($db))->findAll();
        
        // Získáme pár posledních výsledků pro ukázku přes repozitář
        $results = (new ResultRepository($db, new StandardPointsStrategy()))->getLatestResults(2);

        require __DIR__ . '/../../views/home.php';
    }
}