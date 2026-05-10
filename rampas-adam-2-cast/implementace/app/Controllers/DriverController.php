<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Repositories/DriverRepository.php';
require_once __DIR__ . '/../Repositories/TeamRepository.php';
require_once __DIR__ . '/../Models/Driver.php';

    /**
    * Třída DriverController slouží k obsluze HTTP požadavků týkajících se správy jezdců. Obsahuje metody pro zobrazení seznamu jezdců a pro vytvoření nového jezdce.
    * Používá DriverRepository pro získávání a ukládání dat o jezdcích a TeamRepository pro získávání informací o týmech, které jsou potřebné při vytváření nového jezdce.
    */
class DriverController
{
    private DriverRepository $driverRepository;
    private TeamRepository $teamRepository;

    /**
    * Konstruktor třídy DriverController. Inicializuje repozitáře pro jezdce a týmy pomocí připojení k databázi získaného z třídy Database.
    */
    public function __construct()
    {
        $connection = Database::getConnection();
        $this->driverRepository = new DriverRepository($connection);
        $this->teamRepository = new TeamRepository($connection);
    }

    /**
    * Zobrazí seznam všech jezdců. Načítá jezdce z databáze pomocí DriverRepository a předává je do view pro zobrazení.
    */
    public function index(): void
    {
        $drivers = $this->driverRepository->findAll();
        require __DIR__ . '/../../views/drivers/index.php';
    }

    /**
    * Zpracuje vytvoření nového jezdce. Pokud je požadavek typu POST, načte data z formuláře, vytvoří nový objekt Driver a uloží ho do databáze pomocí DriverRepository. Po úspěšném uložení přesměruje uživatele zpět na seznam jezdců.
    * Pokud není požadavek typu POST, načte seznam týmů z databáze pomocí TeamRepository a zobrazí formulář pro vytvoření nového jezdce.
    */
    public function create(): void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $driver = new Driver(
                null,
                $_POST['name'],
                (int)$_POST['number'],
                (int)$_POST['team_id']
            );
            $this->driverRepository->save($driver);
            header('Location: /');
            exit;
        }
        $teams = $this->teamRepository->findAll();
        require __DIR__ . '/../../views/drivers/create.php';
    }
}