<?php

require_once __DIR__ . '/../Models/Result.php';
/**
    * Rozhraní pro repozitář výsledků. Definuje metody pro ukládání a načítání výsledků z databáze.
    * Umožňuje oddělit logiku přístupu k datům od zbytku aplikace, což usnadňuje testování a údržbu.
    */
interface ResultRepositoryInterface {
    public function save(Result $result): bool;
    public function getStandings(): array;
    public function getLatestResults(int $limit = 5): array;
}