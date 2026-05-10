<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Repositories/RaceRepository.php';
require_once __DIR__ . '/../Repositories/DriverRepository.php';
require_once __DIR__ . '/../Repositories/SeasonRepository.php';
require_once __DIR__ . '/../Repositories/ResultRepository.php';
require_once __DIR__ . '/../Models/Result.php';
require_once __DIR__ . '/../Models/Race.php';
require_once __DIR__ . '/../Strategies/StandardPointsStrategy.php';
require_once __DIR__ . '/../Strategies/SprintPointsStrategy.php';

/**
    * Třída ResultController slouží k obsluze HTTP požadavků týkajících se zadávání výsledků závodů. Obsahuje dvě hlavní metody: selectRace() pro výběr závodu, do kterého se budou zadávat výsledky, a enterResults() pro samotné zadávání výsledků
    * Používá RaceRepository pro získávání informací o závodech, DriverRepository pro získávání informací o jezdcích, SeasonRepository pro získávání informací o sezónách a ResultRepository pro ukládání výsledků do databáze. V závislosti na typu závodu (standardní nebo sprint) volí vhodnou strategii pro výpočet bodů.
    */
class ResultController
{
    private ResultRepository $resultRepository;

    /** 
        * Metoda selectRace() zobrazuje formulář pro výběr závodu, do kterého se budou zadávat výsledky. Pokud je odeslán POST požadavek, načte data z formuláře, vytvoří nový záznam závodu v databázi a přesměruje uživatele na stránku pro zadávání výsledků pro tento závod.
        */
    public function selectRace(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = Database::getConnection();
            $raceRepo = new RaceRepository($db);
            $race_id = $raceRepo ->save(new Race(
                null,
                (int)$_POST['season_id'],
                $_POST['type'],
                $_POST['name'],
                $_POST['date'],
                $_POST['location'],
                $_POST['note'],
                (int)($_POST['fastest_driver_id'] ?? 0)
            ));
            header("Location: /results/enter?race_id=$race_id");
            exit;
        }
        $seasons = (new SeasonRepository(Database::getConnection()))->findAll();
        require __DIR__ . '/../../views/results/select_race.php';
    }

    /** 
    * Metoda enterResults() zobrazuje formulář pro zadávání výsledků pro konkrétní závod. Pokud je odeslán POST požadavek, načte data z formuláře, uloží výsledky do databáze pomocí ResultRepository a přesměruje uživatele zpět na hlavní stránku.
    * Volba strategie pro výpočet bodů se provádí na základě typu závodu (standardní nebo sprint).
    */
    public function enterResults(): void
    {
        $db = Database::getConnection();
        $race_id = (int)($_GET['race_id'] ?? 0);

        $raceRepo = new RaceRepository($db);
        $race = $raceRepo->findById($race_id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // volba strategie pro výpočet bodů na základě typu závodu
            if($race && $race->type === 'Sprint'){
                $strategy = new SprintPointsStrategy();
            }
            else {
                $strategy = new StandardPointsStrategy();
            }

            $this->resultRepository = new ResultRepository($db, $strategy);

            foreach ($_POST['positions'] as $pos => $driverId) {
                if (!$driverId) continue;
                
                $this->resultRepository->save(new Result(
                    $race_id,
                    (int)$driverId,
                    (int)$pos,
                    0 // Body se dopočítají uvnitř repozitáře pomocí strategie
                ));
            }
            echo "<script>alert('Data úspěšně zapsána'); window.location.href='/';</script>";
            exit;
        }
        
        $drivers = (new DriverRepository($db))->findAll();
        require __DIR__ . '/../../views/results/enter_results.php'; 
    }
}