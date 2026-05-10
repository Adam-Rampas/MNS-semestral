<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Repositories/ResultRepository.php';
require_once __DIR__ . '/../Strategies/StandardPointsStrategy.php';

/**
* Třída StandingsController slouží k obsluze HTTP požadavků týkajících se zobrazení pořadí (standings) závodů. Obsahuje metodu index(), která načítá aktuální pořadí z databáze a zobrazuje je pomocí view.
* Používá ResultRepository pro získávání dat o výsledcích závodů a StandardPointsStrategy pro výpočet bodů na základě výsledků.
*/
class StandingsController {
    public function index() {
        $db = Database::getConnection();
        // Pro čtení (index) strategii nepotřebujeme, ale konstruktor ji vyžaduje
        $resultRepo = new ResultRepository($db, new StandardPointsStrategy());
        $standings = $resultRepo->getStandings();

        require __DIR__ . '/../../views/standings/index.php';
    }
}
