<?php

require_once __DIR__ . '/../Models/Race.php';

/**
    * Rozhraní pro repozitář závodů. Definuje metody pro ukládání a načítání závodů z databáze.
    * Umožňuje oddělit logiku přístupu k datům od zbytku aplikace, což usnadňuje testování a údržbu.
    */
interface RaceRepositoryInterface
{
    public function save(Race $race): int;
    public function findAll(): array;
    public function findById(int $id): ?Race;
}