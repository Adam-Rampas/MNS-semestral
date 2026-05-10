<?php

require_once __DIR__ . '/PointsStrategy.php';
/**
    * Třída implementující strategii pro výpočet bodů v sprintu.
    * Závodníci získávají body podle své pozice, přičemž první místo získává nejvíce bodů.
    */
class SprintPointsStrategy implements PointsStrategy {
    private array $points = [
        1 => 8, 2 => 7, 3 => 6, 4 => 5, 5 => 4, 6 => 3, 7 => 2, 8 => 1
    ];

    /**
     * Vypočítá body pro závodníka na základě jeho pozice v sprintu.
     * Pokud závodník není v top 8, získává 0 bodů.
     *
     * @param int $position Pozice závodníka v závodě.
     * @return int Počet bodů, které závodník získá.
     */
    public function calculatePoints(int $position): int {
        return $this->points[$position] ?? 0;
    }
}
