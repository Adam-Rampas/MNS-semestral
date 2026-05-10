<?php

require_once __DIR__ . '/PointsStrategy.php';
/**
    * Třída implementující strategii pro výpočet bodů v standardním závodě.
    * Závodníci získávají body podle své pozice, přičemž první místo získává nejvíce bodů.
    */
class StandardPointsStrategy implements PointsStrategy {
    private array $points = [
        1 => 25, 2 => 18, 3 => 15, 4 => 12, 5 => 10,
        6 => 8, 7 => 6, 8 => 4, 9 => 2, 10 => 1
    ];

    /**
     * Vypočítá body pro závodníka na základě jeho pozice v standardním závodě.
     * Pokud závodník není v top 10, získává 0 bodů.
     *
     * @param int $position Pozice závodníka v závodě.
     * @return int Počet bodů, které závodník získá.
     */
    public function calculatePoints(int $position): int {
        return $this->points[$position] ?? 0;
    }
}
