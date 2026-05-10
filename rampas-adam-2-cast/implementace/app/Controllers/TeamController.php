<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Repositories/TeamRepository.php';
require_once __DIR__ . '/../Models/Team.php';
/**
* Třída TeamController slouží k obsluze HTTP požadavků týkajících se týmů. Obsahuje metody pro zobrazení seznamu týmů a pro vytvoření nového týmu.
* Používá TeamRepository pro komunikaci s databází a získávání dat o týmech.
* Metoda index() načítá všechny týmy a zobrazuje je pomocí view, zatímco metoda create() zpracovává formulář pro vytvoření nového týmu a ukládá ho do databáze.
*/
class TeamController
{
    private TeamRepository $teamRepository;

    /**
    * Konstruktor třídy TeamController. Inicializuje repozitář pro týmy pomocí připojení k databázi získaného z třídy Database.
    */ 
    public function __construct()
    {
        $this->teamRepository = new TeamRepository(Database::getConnection());
    }

    /** 
    * Zobrazí seznam všech týmů. Načítá týmy z databáze pomocí TeamRepository a předává je do view pro zobrazení.
    */
    public function index(): void
    {
        $teams = $this->teamRepository->findAll();
        require __DIR__ . '/../../views/teams/index.php';
    }

    /** 
    * Zpracuje vytvoření nového týmu. Pokud je požadavek typu POST, načte data z formuláře, vytvoří nový objekt Team a uloží ho do databáze pomocí TeamRepository. Po úspěšném uložení přesměruje uživatele zpět na seznam týmů.
    * Pokud není požadavek typu POST, zobrazí formulář pro vytvoření nového týmu.
    */
    public function create(): void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $team = new Team(
                null,
                $_POST['name']
            );
            $this->teamRepository->save($team);
            header('Location: /');
            exit;
        }
        require __DIR__ . '/../../views/teams/create.php';
    }
}