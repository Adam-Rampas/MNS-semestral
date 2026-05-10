<?php

require_once __DIR__ . '/../Models/Team.php';
/**
    * Rozhraní pro repozitář týmů. Definuje metody pro ukládání a načítání týmů z databáze.
    * Umožňuje oddělit logiku přístupu k datům od zbytku aplikace, což usnadňuje testování a údržbu.
    */
interface TeamRepositoryInterface {
    public function save(Team $team): int;
    public function findAll(): array;
}
