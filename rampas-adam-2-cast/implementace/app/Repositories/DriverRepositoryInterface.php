<?php

require_once __DIR__ . '/../Models/Driver.php';

/**
    * Rozhraní pro repozitář jezdců. Definuje metody pro ukládání a načítání jezdců z databáze.
    * Umožňuje oddělit logiku přístupu k datům od zbytku aplikace, což usnadňuje testování a údržbu.
    */
interface DriverRepositoryInterface {
    public function save(Driver $driver): bool;
    public function findAll(): array;
}