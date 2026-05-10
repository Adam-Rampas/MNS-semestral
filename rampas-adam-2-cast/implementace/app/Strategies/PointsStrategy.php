<?php

/**
 * Reprezentuje návhový vzor strategy. Umižnuje dynamicky měnit 
 * algoritmus pro výpočet bodů na základě pozice závodníka.
 */
interface PointsStrategy {
    /**
     * Vypočítá body pro závodníka na základě jeho pozice.
     *
     * @param int $position Pozice závodníka v závodě.
     * @return int Počet bodů, které závodník získá.
     */
    public function calculatePoints(int $position): int;
}
