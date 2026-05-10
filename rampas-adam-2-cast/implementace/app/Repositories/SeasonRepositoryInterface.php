<?php

require_once __DIR__ . '/../Models/Season.php';

/**
    * Rozhraní pro repozitář sezón. Definuje metody pro ukládání a načítání sezón z databáze.
    * Umožňuje oddělit logiku přístupu k datům od zbytku aplikace, což usnadňuje testování a údržbu.
    */
interface SeasonRepositoryInterface {
    public function save(Season $season): int;
    public function findAll(): array;
}