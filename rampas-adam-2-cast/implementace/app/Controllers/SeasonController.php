<?php 

require_once __DIR__ . '/../Models/Season.php';
require_once __DIR__ . '/../Repositories/SeasonRepository.php';
require_once __DIR__ . '/../Core/Database.php';

/**
* Třída SeasonController slouží k obsluze HTTP požadavků týkajících se sezón. Obsahuje metody pro zobrazení seznamu sezón a pro vytvoření nové sezóny.
* Používá SeasonRepository pro komunikaci s databází a získávání dat o sezónách.
* Metoda index() načítá všechny sezóny a zobrazuje je pomocí view, zatímco metoda create() zpracovává formulář pro vytvoření nové sezóny a ukládá ji do databáze.
*/
class SeasonController
{
    private SeasonRepository $seasonRepository;

    /**
    * Konstruktor třídy SeasonController. Inicializuje repozitář pro sezóny pomocí připojení k databázi získaného z třídy Database.
    */
    public function __construct()
    {
        $this->seasonRepository = new SeasonRepository(Database::getConnection());
    }

    /** 
    * Zobrazí seznam všech sezón. Načítá sezóny z databáze pomocí SeasonRepository a předává je do view pro zobrazení.
    */
    public function index(): void
    {
        $seasons = $this->seasonRepository->findAll();
        require __DIR__ . '/../../views/seasons/index.php';
    }

    /** 
    * Zpracuje vytvoření nové sezóny. Pokud je požadavek typu POST, načte data z formuláře, vytvoří nový objekt Season a uloží ho do databáze pomocí SeasonRepository. Po úspěšném uložení přesměruje uživatele zpět na seznam sezón.
    * Pokud není požadavek typu POST, zobrazí formulář pro vytvoření nové sezóny.
    */
    public function create(): void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $season = new Season(
                null,
                (int)$_POST['year'],
                $_POST['name']
            );
            $this->seasonRepository->save($season);
            header('Location: /');
            exit;
        }
        require __DIR__ . '/../../views/seasons/create.php';
    }
}